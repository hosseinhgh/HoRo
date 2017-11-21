<?php

/* master.html.twig */
class __TwigTemplate_87a86df006dd2202e643b264156f3e573238b8b43873d898258852522591c01a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'headextra' => array($this, 'block_headextra'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <link href=\"../css/styles.css\" rel=\"stylesheet\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
        <meta charset=\"UTF-8\">
        <meta name=\"description\" content=\"test your knowledge\">
        <meta name=\"author\" content=\"roberto hossein\">
        <meta name=\"keywords\" content=\"test,online,affordable\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 12
        $this->displayBlock('headextra', $context, $blocks);
        // line 13
        echo "</head>
<body>
    <header>
        <div class=\"container\">
            <div id=\"brand\">
                <img src=\"images/horoLogo.png\" alt=\"\" />
            </div>
            <nav>
                <ul>

                    ";
        // line 23
        if ((isset($context["userSession"]) ? $context["userSession"] : null)) {
            // line 24
            echo "                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Student</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/student/add\">Add Student</a>
                                <a href=\"/student/list\">List of Students</a>
                            </div>
                        </li>

                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Subject</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/subject/add\">Add Subject</a>
                                <a href=\"/subject/list\">List of Subject</a>
                            </div>
                        </li>
                        
                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Questions</a>
                            <div class=\"dropdown-content\">
                                <a href=\"#\">Add Questions</a>
                                <a href=\"#\">List of Questions</a>
                            </div>
                        </li>
                        
                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Answers</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/question/add\">Add Answers</a>
                                <a href=\"/questions/list\">List of Answers</a>
                            </div>
                        </li>
                        <li><a href=\"/logout\">Logout</a></li>
                        ";
        } else {
            // line 57
            echo "                        <li><a href=\"/login\">Login</a></li>
                        <li><a href=\"/register\">Register</a></li>
                        ";
        }
        // line 60
        echo "
                </ul>
            </nav>
        </div>
    </header><!--end of header-->
    <div id=\"centeredContent\">
        ";
        // line 66
        if ((isset($context["userSession"]) ? $context["userSession"] : null)) {
            // line 67
            echo "            <p>You're logged in as ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userSession"]) ? $context["userSession"] : null), "name", array()), "html", null, true);
            echo ".
                You may <a href=\"/logout\">logout</a></p>
            ";
        } else {
            // line 70
            echo "            <p>You're not logged in. You may <a href=\"/register\">Register</a>
                or <a href=\"/login\">Login</a>.</p>

        ";
        }
        // line 74
        echo "
    ";
        // line 75
        $this->displayBlock('content', $context, $blocks);
        // line 76
        echo "</div>
<footer>
    <p>Created by <a href=\"#\">WebSpawn</a>, Copyright Online Examination &copy; 2017</p>

</footer>
</body>
</html>
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Default";
    }

    // line 12
    public function block_headextra($context, array $blocks = array())
    {
    }

    // line 75
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 75,  139 => 12,  133 => 11,  122 => 76,  120 => 75,  117 => 74,  111 => 70,  104 => 67,  102 => 66,  94 => 60,  89 => 57,  54 => 24,  52 => 23,  40 => 13,  38 => 12,  34 => 11,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <link href=\"../css/styles.css\" rel=\"stylesheet\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
        <meta charset=\"UTF-8\">
        <meta name=\"description\" content=\"test your knowledge\">
        <meta name=\"author\" content=\"roberto hossein\">
        <meta name=\"keywords\" content=\"test,online,affordable\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>{% block title %}Default{% endblock %}</title>
    {% block headextra %}{% endblock %}
</head>
<body>
    <header>
        <div class=\"container\">
            <div id=\"brand\">
                <img src=\"images/horoLogo.png\" alt=\"\" />
            </div>
            <nav>
                <ul>

                    {% if userSession %}
                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Student</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/student/add\">Add Student</a>
                                <a href=\"/student/list\">List of Students</a>
                            </div>
                        </li>

                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Subject</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/subject/add\">Add Subject</a>
                                <a href=\"/subject/list\">List of Subject</a>
                            </div>
                        </li>
                        
                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Questions</a>
                            <div class=\"dropdown-content\">
                                <a href=\"#\">Add Questions</a>
                                <a href=\"#\">List of Questions</a>
                            </div>
                        </li>
                        
                        <li class=\"dropdown\">
                            <a href=\"javascript:void(0)\" class=\"dropbtn\">Answers</a>
                            <div class=\"dropdown-content\">
                                <a href=\"/question/add\">Add Answers</a>
                                <a href=\"/questions/list\">List of Answers</a>
                            </div>
                        </li>
                        <li><a href=\"/logout\">Logout</a></li>
                        {% else %}
                        <li><a href=\"/login\">Login</a></li>
                        <li><a href=\"/register\">Register</a></li>
                        {% endif %}

                </ul>
            </nav>
        </div>
    </header><!--end of header-->
    <div id=\"centeredContent\">
        {% if userSession %}
            <p>You're logged in as {{ userSession.name }}.
                You may <a href=\"/logout\">logout</a></p>
            {% else %}
            <p>You're not logged in. You may <a href=\"/register\">Register</a>
                or <a href=\"/login\">Login</a>.</p>

        {% endif %}

    {% block content %}{% endblock %}
</div>
<footer>
    <p>Created by <a href=\"#\">WebSpawn</a>, Copyright Online Examination &copy; 2017</p>

</footer>
</body>
</html>
{# empty Twig template #}
", "master.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\master.html.twig");
    }
}
