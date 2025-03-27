<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails de l'Étudiant</title>
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
        }
        
        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: var(--shadow);
        }
        
        .profile-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-top: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 1rem;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: var(--accent-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin-right: 1.5rem;
        }
        
        .profile-details {
            flex-grow: 1;
        }
        
        .detail-section {
            margin-bottom: 1.5rem;
        }
        
        .detail-label {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .detail-value {
            background-color: rgba(52, 152, 219, 0.05);
            border-left: 4px solid var(--accent-color);
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
        }
        
        .gender-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            color: white;
            margin-right: 10px;
        }
        
        .gender-icon.male {
            background-color: var(--accent-color);
        }
        
        .gender-icon.female {
            background-color: #e84393;
        }
        
        .btn-back {
            background-color: #7f8c8d;
            border: none;
            border-radius: 8px;
            color: white;
            padding: 10px 20px;
            transition: all 0.3s;
        }
        
        .btn-back:hover {
            background-color: #6c7a7d;
            transform: translateY(-2px);
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
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
            <h2 class="text-white m-0 ms-auto fs-4">Détails de l'Étudiant</h2>
        </div>
    </nav>

    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-avatar">
                    {{-- @if($student -> gender == 'homme')
                        <i class="fas fa-mars"></i>
                    @elseif($student -> gender == 'femme')
                        <i class="fas fa-venus"></i>
                    @else --}}
                        <i class="fas fa-user"></i>
                    {{-- @endif --}}
                </div>
                <div class="profile-details">
                    <h2 class="mb-1">{{ $student -> first_name }} {{ $student -> last_name }}</h2>
                    {{-- <div>
                        @if($student -> gender == 'homme')
                            <span class="gender-icon male"><i class="fas fa-mars"></i></span>
                        @elseif($student -> gender == 'femme')
                            <span class="gender-icon female"><i class="fas fa-venus"></i></span>
                        @endif
                        <span class="text-muted">{{ ucfirst($student -> sexe) }}</span>
                    </div> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="detail-section">
                        <div class="detail-label">
                            <i class="fas fa-id-card me-2"></i> Nom
                        </div>
                        <div class="detail-value">{{ $student -> last_name }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-section">
                        <div class="detail-label">
                            <i class="fas fa-signature me-2"></i> Prénom
                        </div>
                        <div class="detail-value">{{ $student -> first_name}}</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="detail-section">
                        <div class="detail-label">
                            <i class="fas fa-calendar-alt me-2"></i> Date de naissance
                        </div>
                        <div class="detail-value">{{ $student -> birth_date }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-section">
                        <div class="detail-label">
                            <i class="fas fa-venus-mars me-2"></i> Genre
                        </div>
                        <div class="detail-value">
                            {{ ucfirst($student -> gender) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="detail-section">
                        <div class="detail-label">
                            <i class="fas fa-phone me-2"></i> Téléphone
                        </div>
                        <div class="detail-value">{{ $student -> phone }}</div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('students.index') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left me-2"></i> Retour à la liste
                </a>
                <div>
                    <a href="{{ route('students.edit', $student -> id) }}" class="btn btn-primary me-2">
                        <i class="fas fa-edit me-2"></i> Modifier
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash me-2"></i> Supprimer
                    </button>
                </div>
            </div>
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