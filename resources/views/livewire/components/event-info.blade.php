<div class="row">
  <div class="col-12 col-lg-12 m-auto mb-4">
    <div class="card p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Évènement</h5>
        </div>
        @if (auth()->user()->isAdmin())
          <a href="{{ route('events.edit', $event->id) }}" class="btn bg-gradient-dark btn-sm mb-0 mx-2" type="button">
            Modifier
          </a>
        @endif
      </div>
      <div class="row mt-3">
        <div class="col-12 col-sm-6">
          <label for="Nom" class="control-label">Nom</label>
          <input type="text" class="form-control" value="{{ $event->Nom }}" disabled />
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
          <label for="Date" class="control-label">Date</label>
          <input type="text" class="form-control" value="{{ $event->Date }}" disabled />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-sm-4">
          <label for="HeureEvenement" class="control-label">Heure de l'évènement</label>
          <input type="text" class="form-control" value="{{ date('H:i', strtotime($event->HeureEvenement)) }}" disabled />
        </div>
        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
          <label for="HeureFinEvenement" class="control-label">Heure de fin</label>
          <input type="text" class="form-control" value="{{ date('H:i', strtotime($event->HeureFinEvenement)) }}" disabled />
        </div>
        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
          <label for="HeureArrive" class="control-label">Heure d'arrivé</label>
          <input type="text" class="form-control" value="{{ date('H:i', strtotime($event->HeureArrive)) }}" disabled />
        </div>
      </div>
    </div>
  </div>
</div>
