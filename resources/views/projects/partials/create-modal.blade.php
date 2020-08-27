<x-modals.form
  buttonName="New Project"
  title="Create Project"
  :action="route('projects.store')"
  method="POST"
>

  <x-inputs.text
    label="Project Name"
    name="name"
    required="true"
  />

  <x-inputs.date
    label="Deadline"
    name="deadline"
    :minDate="date('Y-m-d', strtotime(now()->addDays(1)))"
  />

</x-modals>