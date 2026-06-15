


@extends('layouts.main_layout')

@section('content')
<main id="main" class="main">
  <div class="container">
    <h3 style="color:gray">Mes Notifications</h3>

    {{-- Notifications existantes (déjà lues) --}}
    <ul class="list-group">
      @forelse($notifications as $notification)
        <li class="list-group-item" style="color:red">
          {{ $notification->data['message'] ?? 'Notification sans message' }} 

          <span class="text-muted float-end">{{ $notification->created_at->diffForHumans() }}
           
 
           <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Voulez-vous supprimer cette notification ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </span>
        </li>
        
      @empty
        <li class="list-group-item" style="color:red">Aucune notification</li>
      @endforelse
    </ul>

    {{-- Conteneur pour les nouvelles notifications AJAX --}}
    <div id="notifications" class="mt-4">
     
      <ul id="notifications-list" class="list-group"></ul>
    </div>
  </div>
</main>
@endsection


@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Fonction pour afficher une notification reçue via AJAX
  function displayNotification(notification) {
    const list = document.getElementById('notifications-list');
    const li = document.createElement('li');
    li.classList.add('list-group-item', 'list-group-item-warning');
    li.innerHTML = `
        ${notification.data.message}
        <span class="text-muted float-end">${new Date(notification.created_at).toLocaleString()}</span>
    `;
    list.appendChild(li);
  }

  // Fonction pour vérifier les notifications toutes les 30s
  function checkForNewNotifications() {
    fetch('/api/notifications', {
      method: 'GET',
    })
    .then(response => response.json())
    .then(data => {
      console.log("Notifications reçues:", data);
      const list = document.getElementById('notifications-list');
      list.innerHTML = ''; // vider avant d'ajouter les nouvelles
      data.forEach(notification => displayNotification(notification));
    })
    .catch(error => {
      console.error('Erreur lors de la récupération des notifications:', error);
    });
  }

  // Appels initiaux et intervalle
  setInterval(checkForNewNotifications, 30000);
  checkForNewNotifications();

  // jQuery pour confirmation suppression formulaire
  $(document).ready(function () {
    $('.delete-form').on('submit', function (e) {
      if (!confirm('Voulez-vous supprimer cette notification ?')) {
        e.preventDefault(); // Empêche la soumission du formulaire si annulation
      }
    });
  });
</script>

@endsection
