<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalp Atışi</title>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'atvice';
            src: url('https://github.com/Flat-Pixels/Notifications-card-animation/raw/master/fonts/atvice-webfont.woff') format('woff2'),
                 url('https://github.com/Flat-Pixels/Notifications-card-animation/raw/master/fonts/atvice-webfont.woff2') format('woff');
            font-weight: normal;
            font-style: normal;
        }
        * { box-sizing: border-box; }
        body {
            background-image: url('/public/image/notifInf.jpg'); /* Remplacez URL_DE_VOTRE_IMAGE par le lien de votre image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        h2 {
            color: #F0F8FF; 
        }
        .wrapper {
            width: 780px;
            margin: 50px auto;
        }
        .notifications__item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            width: 100%;
            height: auto;
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 15px 20px 0px rgb(0, 0, 0, .2);
            transition: all .3s ease-in;
            cursor: pointer;
        }
        .notifications__item__content { width: 100%; }
        .notifications__item__title { letter-spacing: 1px; font-family: 'atvice', sans-serif; font-size: 23px; color: #314E52; font-weight: 900; }
        .notifications__item__text { margin-top: 10px; font-size: 18px; color: #314E52; }
        .notifications__item__option { width: 20px; height: 20px; margin: 8px 0; border-radius: 50%; color: white; opacity: 0; font-size: 10px; text-align: center; line-height: 20px; cursor: pointer; transition: all .2s; }
        .notifications__item__option.archive { background-color: #087990a2; }
        .notifications__item:hover { background-color: #f7f7f7; transform: scale(0.95); box-shadow: 0px 5px 10px 0px rgb(0, 0, 0, .2); }
        .notifications__item:hover .notifications__item__option { opacity: 1; }
        .notifications__item.archive { background-color: #3dc98c; animation: archiveAnimation 1.5s cubic-bezier(0, 0, 0, 1.12) forwards; animation-delay: .6s; }
        @keyframes archiveAnimation { to { transform: translateX(100px); opacity: 0; } }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text fw-bold mb-0" style="color: #087990;">Kalp<span class="text-dark">Atışi</span></h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                </div>
            </nav>
        </div>
    </div>
    <!-- Notifications Section -->
    <div style="color:#021A39; text-align: center;" class="container">
        <div class="col-sm-12 justify-content-center mt-5 pt-2 pb-2">
            <h2>Mes Notifications</h2>
        </div>
    </div>
    <div class="wrapper">
        <div class="notifications" id="notifications-list">
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <!-- Footer Content -->
            </div>
        </div>
    </div>
    <script>
        // Récupérer et afficher les notifications
        function fetchNotifications() {
            fetch('fetch_notifications_medecin.php') // script PHP pour récupérer les notifications
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const notificationsList = document.getElementById('notifications-list');
                    notificationsList.innerHTML = '';
                    if (data.length!==0) {
                        data.forEach(notification => {
                            const notificationItem = document.createElement('div');
                            notificationItem.className = 'notifications__item';
                            notificationItem.setAttribute('notification-id', notification.id);
                            notificationItem.innerHTML = `
                                <div class="notifications__item__content">
                                    <span class="notifications__item__title">${notification.title}</span>
                                    <p class="notifications__item__text">le patient ${notification.nom} ${notification.prenom} dans la salle : ${notification.salle}</p>
                                </div>
                                <div class="notifications__item__option archive js-option" onclick="supprimerNotification(${notification.id})"> 
                                    <i class="fas fa-folder"></i>
                                </div>
                            `;
                            notificationsList.appendChild(notificationItem);
                        });
                    } else {
                        notificationsList.innerHTML = '<p>Aucune notification trouvée.</p>';
                    }
                })
                .catch(error => console.error('Erreur lors de la récupération des notifications:', error));
            }
        // Supprimer une notification
        function supprimerNotification(notificationID) {
            console.log(notificationID); 
            fetch('supprimer_notification.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: notificationID })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Gérer la suppression réussie
                    console.log('Notification supprimée avec succès');
                    document.querySelector(`.notifications__item[notification-id="${notificationID}"]`).remove();
                } else {
                    console.error('Erreur lors de la suppression de la notification :', data.error);
                }
            })
            .catch(error => {
                console.error('Erreur :', error);
            });
        }

        // Récupérer les notifications initialement et toutes les 5 secondes
        fetchNotifications();
    </script>
</body>
</html>
