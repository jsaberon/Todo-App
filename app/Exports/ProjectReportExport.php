<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjectReportExport implements FromView
{
    public function __construct($project) {
      $this->project = $project;

      return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View {
      return view('exports.project-report', ['project' => $this->project]);
    }
}
