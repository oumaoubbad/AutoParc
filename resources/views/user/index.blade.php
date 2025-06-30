@extends("layouts.master")

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css"/>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card border-info shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h2 class="mb-0">Utilisateurs</h2>
                    <a href="{{ route('user.create') }}" class="btn btn-info">
                        <i class="fas fa-plus me-1"></i> Ajouter Utilisateur
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">
                        {{ $message }}
                    </div>
                @endif

                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Sexe</th>
                                <th>Nom & Prénom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-center">
                                    @if($user->sex == "0")
                                        <img src="{{ asset('images/0000.png') }}" width="35" alt="Femme" />
                                    @else
                                        <img src="{{ asset('images/000.png') }}" width="35" alt="Homme" />
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role)
                                        <span class="badge bg-danger">Admin</span>
                                    @else
                                        <span class="badge bg-info text-dark">User</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="delete-user-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/fr_fr.json'
        }
    });

    // SweetAlert2 confirmation on delete
    $('.delete-user-form').on('submit', function(e) {
        e.preventDefault(); // Stop form submission

        const form = this;

        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
