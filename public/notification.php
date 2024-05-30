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
        .notifications__item__option.archive { background-color: #3dc98c; }
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
            <p>Il y a un patient dans la salle :</p>
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
            fetch('fetch_notifications.php') // script PHP pour récupérer les notifications
                .then(response => response.json())
                .then(data => {
                    const notificationsList = document.getElementById('notifications-list');
                    notificationsList.innerHTML = '';
                    data.forEach(notification => {
                        const notificationItem = document.createElement('div');
                        notificationItem.className = 'notifications__item';
                        notificationItem.innerHTML = `
    <div class="notifications__item__content">
        <span class="notifications__item__title"></span>
        <p class="notifications__item__text">Il y a un patient dans la salle : ${notification.salle}</p>
    </div>
    <div>
        <div class="notifications__item__option archive js-option">
            <i class="fas fa-folder"></i>
        </div>
    </div>
`;
                        notificationsList.appendChild(notificationItem);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des notifications:', error));
        }

        // Archiver/Supprimer une notification
        function archiveOrDelete(clickBtn, notificationCard) {
            if (clickBtn.classList.contains('archive')) {
                notificationCard.classList.add('archive');
            } else if (clickBtn.classList.contains('delete')) {
                notificationCard.classList.add('delete');
            }
        }

        // Attacher les événements de clic aux options
        document.addEventListener('click', function (e) {
            if (e.target.closest('.js-option')) {
                const notificationCard = e.target.closest('.notifications__item');
                const clickBtn = e.target.closest('.js-option');
                archiveOrDelete(clickBtn, notificationCard);
                setTimeout(() => {
                    notificationCard.style.transition = 'all .4s ease';
                    notificationCard.style.height = 0;
                    notificationCard.style.margin = 0;
                    notificationCard.style.padding = 0;
                    setTimeout(() => notificationCard.remove(), 1500);
                }, 1500);
            }
        });

        // Récupérer les notifications initialement et toutes les 5 secondes
        fetchNotifications();
        setInterval(fetchNotifications, 5000);
    </script>
</body>
</html>
