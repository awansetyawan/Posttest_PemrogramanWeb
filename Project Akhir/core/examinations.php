<?php

require_once('functions.php');

function examination_documents($documents) {
  /** 
   * * TIPE DOKUMEN
   * * 1 = ITCCM APPROVAL
   * * 2 = AUDITOR EXAMINATION PLAN
   * * 3 = COMPANY PAYMENT
   */
  $approval = null;
  $examination_plan = null;
  $payment = null;

  $document_names = [
    'approval'         => 'Approval ITCCM',
    'examination_plan' => 'Examination Plan Auditor',
    'payment'          => 'Pembayaran Company',
  ];

  foreach($documents as $document) {
    switch ($document->document_type) {
      case '1':
        $approval = $document;
        break;
      case '2':
        $examination_plan = $document;
        break;
      case '3':
        $payment = $document;
        break;
    }
  }
  return [
    (object) [
      'type_id' => 1,
      'type' => 'approval',
      'name' => $document_names['approval'],
      'document' => $approval
    ],
    (object) [
      'type_id' => 2,
      'type' => 'examination_plan',
      'name' => $document_names['examination_plan'],
      'document' => $examination_plan
    ],
    (object) [
      'type_id' => 3,
      'type' => 'payment',
      'name' => $document_names['payment'],
      'document' => $payment
    ],
  ];
}

function examination_list($extra_query = '', $options = [])
{
  $per_auditor = isset($options["auditor_id"]) ? "JOIN examination_auditors ON examinations.id = examination_auditors.examination_id AND examination_auditors.auditor_id={$options["auditor_id"]}" : "";
  
  $examinations = query("
    SELECT
      examinations.*,
      standards.name as standard_name,
      companies.registration_number as registration_number,
      companies.name as company_name
    FROM examinations
    JOIN standards ON examinations.standard_id = standards.id
    JOIN companies ON examinations.company_id = companies.id
    {$per_auditor}
    {$extra_query}
    ORDER BY examinations.id DESC
  ");

  foreach ($examinations as $examination) {

    if (isset($options['with_auditors'])) {
      $auditors = query("SELECT
          DISTINCT examination_auditors.auditor_id as id,
          CONCAT(auditors.first_name, ' ', auditors.last_name) as name,
          auditors.photo as photo,
          auditors.email as email,
          auditors.phone_number as phone_number,
          examination_auditors.position as position
        FROM examination_auditors
        JOIN auditors ON examination_auditors.auditor_id = auditors.id
        WHERE examination_id={$examination->id}
        ORDER BY examination_auditors.position");
      $examination->auditors = $auditors;
    }

    if (isset($options['with_schedules'])) {
      $schedules = query("SELECT
          examination_auditors.id as examination_auditor_id,
          examination_auditors.auditor_id as auditor_id,
          CONCAT(auditors.first_name, ' ', auditors.last_name) as auditor_name,
          examination_auditors.start_date as start_date,
          examination_auditors.end_date as end_date,
          examination_auditors.position as position
        FROM examination_auditors
        JOIN auditors ON examination_auditors.auditor_id = auditors.id
        WHERE examination_id={$examination->id}
      ");
      $examination->schedules = $schedules;
    }

    if (isset($options['with_scopes'])) {
      $scopes = query("SELECT
          examination_scopes.id as examination_scope_id,
          scopes.id as scope_id,
          scopes.code as scope_code,
          scopes.name as scope_name
        FROM examination_scopes
        JOIN scopes ON examination_scopes.scope_id = scopes.id
        WHERE examination_id={$examination->id}
      ");
      $examination->scopes = $scopes;
    }

    if (isset($options['with_documents'])) {
      $documents = query("SELECT * FROM examination_documents WHERE examination_id={$examination->id}");
      $examination->documents = examination_documents($documents);
    }

    $examination->status_label = [
      '1' => 'Registrasi',
      '2' => 'Penjadwalan',
      '3' => 'Proses',
      '4' => 'Selesai'
    ][$examination->status];
  }

  return $examinations;
}

function examination_show($id)
{
  $examinations = examination_list("WHERE examinations.id = $id", [
    'with_schedules' => true,
    'with_auditors' => true,
    'with_scopes' => true,
    'with_documents' => true
  ]);
  return empty($examinations) ? [] : $examinations[0];
}
