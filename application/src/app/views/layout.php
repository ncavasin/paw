<!DOCTYPE html>
<html>
    <head>
        {% block head %}
            {{ include "/parts/head.php" }}
        {% endblock %}

        {% block title %}
            {{ title ? title : "Dental Medical Group" }}
        {% endblock %}
    </head>
    <body>
        <header>
            {% block header %}
                {{ include "/parts/header.php" }}
            {% endblock %}
        </header>

        <main>
            {% block main %}

            {% endblock %}
        </main>

        <footer>
            {% block footer %}
                {{ include "/parts/footer.php" }}
            {% endblock %}
        </footer>
    </body>
</html>