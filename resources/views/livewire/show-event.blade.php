<div>
  @if ($event)
    <div class="container-fluid py-4">

      <livewire:components.event-info :event="$event">
        <div class="row">
          <div class="col-12 col-lg-12 m-auto mb-4">
            <livewire:components.tables.hosts-table :eventId="$eventId">
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-12 m-auto mb-4">
            <livewire:components.events-users-table :eventId="$eventId" :assignButton="true">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button onclick="history.back()" class="btn btn-default"><i class="fas fa-arrow-left"></i>
              Retour</button>
          </div>
        </div>
    </div>
  @else
    <div class="container-fluid py-4">
      <h2>Pas d'évènement aujourd'hui</h2>
    </div>
  @endif
</div>

<script>
  (function() {
    window.onpageshow = function(event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
  })();
</script>
