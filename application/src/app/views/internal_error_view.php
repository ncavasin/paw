{% extends "layout.php" %}


{% block head %}
    {{ parent() }}

    <link rel="stylesheet" type='text/css' href="assets/css/index.css"/>   
    <link rel="stylesheet" type='text/css' href="assets/css/main.css"/>   
{% endblock %}


{% block main %}
    <h2>{{ titulo ? titulo : "" }}</h2>
{% endblock %}