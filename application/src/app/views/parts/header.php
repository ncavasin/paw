{% block header %}

    <ul class="menu_user">

        <li><a href="{{ contact.href }}" class="telefono">{{ contact.name }}</a></li>
    
        {% for opt in userOptions %}
            
            <li><a href=" {{ opt.href }} " target="_self" class="user_opt" >{{ opt.name }} </a></li>

        {% endfor %}
    
    </ul>

    <nav>
        <h1 class="logotipo">
            <a href="../" target="_self">Dental<br>Medical<br>Group</a>
        </h1>

        <ul class="main_menu">
            
            {% for opt in menuOptions %}

                <li class="main_menu_opt"><a href=" {{ opt.href }} " target="_self" >{{ opt.name }} </a></li>
            
            {% endfor %}

        </ul>
    </nav>


{% endblock %}