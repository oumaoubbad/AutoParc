@extends('layouts.master')

@section('content')

<!-- Modal Planification -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-info">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="bookingModalLabel">Nouvelle planification</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <label for="title" class="form-label fw-semibold">Titre de l'événement</label>
        <input type="text" class="form-control" id="title" placeholder="Entrez le titre">
        <div id="titleError" class="form-text text-danger mt-1"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" id="saveBtn" class="btn btn-info">Valider</button>
      </div>
    </div>
  </div>
</div>

<!-- Calendrier -->
<div class="card border-info my-5 shadow-sm">
  <h3 class="text-center mt-4 mb-4 text-info fw-bold">Planification</h3>
  <div id="calendar" class="p-3"></div>
</div>

@endsection

@section('css')
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- FullCalendar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
@endsection

@section('js')
<!-- jQuery et dépendances -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!-- Bootstrap Bundle (JS + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  var booking = @json($events);

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay',
    },
    events: booking,
    selectable: true,
    selectHelper: true,
    select: function(start, end) {
      $('#title').val('');
      $('#titleError').text('');
      var modal = new bootstrap.Modal(document.getElementById('bookingModal'));
      modal.show();

      // Désactive l'ancien handler avant d'en ajouter un nouveau
      $('#saveBtn').off('click').on('click', function() {
        var title = $('#title').val().trim();
        if(!title) {
          $('#titleError').text('Le titre est obligatoire.');
          return;
        }
        var start_date = moment(start).format('YYYY-MM-DD');
        var end_date = moment(end).format('YYYY-MM-DD');

        $.ajax({
          url: "{{ route('calendar.store') }}",
          type: "POST",
          dataType: 'json',
          data: { title, start_date, end_date },
          success: function(response) {
            modal.hide();
            $('#calendar').fullCalendar('renderEvent', {
              id: response.id,
              title: response.title,
              start: response.start,
              end: response.end,
              color: response.color ?? '#3788d8'
            }, true);
            Swal.fire({
              icon: 'success',
              title: 'Événement créé !',
              timer: 2000,
              showConfirmButton: false
            });
          },
          error: function(xhr) {
            if(xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.title) {
              $('#titleError').text(xhr.responseJSON.errors.title[0]);
            } else {
              Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
            }
          }
        });
      });
    },
    editable: true,
    eventDrop: function(event) {
      $.ajax({
        url: "{{ route('calendar.update', '') }}/" + event.id,
        type: "PATCH",
        dataType: 'json',
        data: {
          start_date: moment(event.start).format('YYYY-MM-DD'),
          end_date: event.end ? moment(event.end).format('YYYY-MM-DD') : moment(event.start).format('YYYY-MM-DD')
        },
        success: function() {
          Swal.fire({
            icon: 'success',
            title: 'Événement mis à jour',
            timer: 1500,
            showConfirmButton: false
          });
        },
        error: function() {
          Swal.fire('Erreur', 'La mise à jour a échoué.', 'error');
        }
      });
    },
    eventClick: function(event) {
      Swal.fire({
        title: 'Confirmer la suppression',
        text: "Voulez-vous vraiment supprimer cet événement ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "{{ route('calendar.destroy', '') }}/" + event.id,
            type: "DELETE",
            dataType: 'json',
            success: function() {
              $('#calendar').fullCalendar('removeEvents', event.id);
              Swal.fire({
                icon: 'success',
                title: 'Événement supprimé',
                timer: 2000,
                showConfirmButton: false
              });
            },
            error: function() {
              Swal.fire('Erreur', 'La suppression a échoué.', 'error');
            }
          });
        }
      });
    }
  });
});
</script>
@endsection
