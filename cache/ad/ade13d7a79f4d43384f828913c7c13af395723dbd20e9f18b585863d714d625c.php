<?php

/* studentsList.html.twig */
class __TwigTemplate_27684949e6c5fa34ad9b381a8fa02b7adeb5b4dd6e48bdbdff786b76577a89a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "studentsList.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Students List";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ((isset($context["userSession"]) ? $context["userSession"] : null)) {
            // line 7
            echo "        <table>

            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Photo</th>
                <th>ACTION</th>
            </tr>

            ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["studentsList"]) ? $context["studentsList"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 20
                echo "                <tr>
                    <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "firstName", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "lastName", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "email", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "gender", array()), "html", null, true);
                echo "</td>
                    <td><img src=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "imagePath", array()), "html", null, true);
                echo "\" width=\"60\"></td>
                    <td>
                        <a href=\"/students/edit/";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "id", array()), "html", null, true);
                echo "\">EDIT</a>
                        <a href=\"/students/delete/";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "id", array()), "html", null, true);
                echo "\">DELETE</a>
                    </td>

                </tr>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "
        </table>

        <div class=\"paginationContainer\">
            ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxPages"]) ? $context["maxPages"] : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 39
                echo "                <a href=\"/students/";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a> 
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "        </div>

    ";
        } else {
            // line 44
            echo "        <p>you must register or login to view data</p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "studentsList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 44,  144 => 41,  133 => 39,  129 => 38,  123 => 34,  104 => 29,  100 => 28,  95 => 26,  91 => 25,  87 => 24,  83 => 23,  79 => 22,  75 => 21,  72 => 20,  55 => 19,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"master.html.twig\" %}

{% block title %}Students List{% endblock %}

{% block content %}
    {% if userSession %}
        <table>

            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Photo</th>
                <th>ACTION</th>
            </tr>

            {% for t in studentsList %}
                <tr>
                    <td>{{loop.index}}</td>
                    <td>{{t.firstName}}</td>
                    <td>{{t.lastName}}</td>
                    <td>{{t.email}}</td>
                    <td>{{t.gender}}</td>
                    <td><img src=\"{{t.imagePath}}\" width=\"60\"></td>
                    <td>
                        <a href=\"/students/edit/{{t.id}}\">EDIT</a>
                        <a href=\"/students/delete/{{t.id}}\">DELETE</a>
                    </td>

                </tr>
            {% endfor %}

        </table>

        <div class=\"paginationContainer\">
            {% for page in range(1,maxPages) %}
                <a href=\"/students/{{page}}\">{{page}}</a> 
            {% endfor %}
        </div>

    {% else %}
        <p>you must register or login to view data</p>
    {% endif %}
{% endblock %}", "studentsList.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\studentsList.html.twig");
    }
}
