{% block footer %}

    <address>
        <p>El Grito de Alcorta N°110</p>
        <p>B6620 Chivilcoy</p>
        <p>Provincia de Buenos Aires</p>
    </address>

    <small>Dental Medical Group&trade; 2021</small>

    <ul>
        {% for opt in footerLinks %}
            <li><a href="{{ opt.href }}"><i class="{{ gg-opt.name }}"></i></a></li>
        {% endfor %}}
    <ul>

{% endblock %}