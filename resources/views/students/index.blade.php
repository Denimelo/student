<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Étudiants</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a3a5f;
            --secondary-color: #e8eef3;
            --accent-color: #3498db;
            --text-color: #333;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--secondary-color), #ffffff);
            color: var(--text-color);
            min-height: 100vh;
            padding-bottom: 2rem;
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: var(--shadow);
        }
        
        .table-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border: none;
            padding: 12px 15px;
        }
        
        .table thead th:first-child {
            border-top-left-radius: 10px;
        }
        
        .table thead th:last-child {
            border-top-right-radius: 10px;
        }
        
        .table tbody tr:nth-of-type(even) {
            background-color: rgba(52, 152, 219, 0.05);
        }
        
        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }
        
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-top: 1px solid #eee;
        }
        
        .btn-add {
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-add:hover {
            background-color: #219653;
            transform: translateY(-2px);
            color: white;
        }
        
        .gender-icon {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            color: white;
        }
        
        .gender-icon.male {
            background-color: var(--accent-color);
        }
        
        .gender-icon.female {
            background-color: #e84393;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 80px;
            background-color: var(--accent-color);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                <span>Gestion des Étudiants</span>
            </a>
            <h2 class="text-white m-0 ms-auto fs-4">Liste des Étudiants</h2>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="section-title">Étudiants inscrits</h3>
            <a href="{{ route('students.create') }}" class="btn btn-add">
                <i class="fas fa-user-plus me-2"></i> Nouvel Étudiant
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="table-container">
            @if(count($students) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Sexe</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{$student -> last_name}}</td>
                                    <td>{{$student -> first_name}}</td>
                                    <td>{{$student -> birth_date}}</td>
                                    <td>
                                        @if($student -> gender == "homme")
                                            <span class="gender-icon male"><i class="fas fa-mars"></i></span>
                                        @elseif($student -> gender == "femme")
                                            <span class="gender-icon female"><i class="fas fa-venus"></i></span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex align-items-center">
                                            <i class="fas fa-phone text-muted me-2"></i>
                                            {{$student -> phone}}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('students.show', $student -> id) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('students.edit', $student -> id) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-edit me-2"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fas fa-trash me-2"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-users text-muted" style="font-size: 4rem;"></i>
                    <h4 class="mt-3">Aucun étudiant inscrit</h4>
                    <p class="text-muted">Commencez par ajouter un nouvel étudiant.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet étudiant ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="{{ route('students.destroy', $student -> id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>