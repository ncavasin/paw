{% extends "layout.php" %}


{% block head %}
    {{ parent() }}

    <link rel='stylesheet' type='text/css' href='assets/css/notification.css' />
    <link rel='stylesheet' type='text/css' href='assets/css/botones.css' />
    <link rel='stylesheet' type='text/css' href='assets/css/waiting_list.css' />
    <script src={{ isMedic ? '/js/components/WaitingListMedic.js' : '/js/components/WaitingListUser.js' }}></script>
{% endblock %}


{% block main %}
    <h2>Cargando, por favor espere..</h2>
{% endblock %}