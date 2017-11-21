<?php

/* subjectList.html.twig */
class __TwigTemplate_aa1ca6eba16047fd50bda97b18719d73206d2b880bdfea429222849fa6e75fa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "subjectList.html.twig", 1);
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
        echo "Subject List";
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
                <th>Name</th>
                <th>Description</th>
                
                <th>ACTION</th>
            </tr>

            ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["subjectsList"]) ? $context["subjectsList"] : null));
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
                // line 18
                echo "                <tr>
                    <td>";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "name", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "description", array()), "html", null, true);
                echo "</td>
                    
                    <td>
                        <a href=\"/subject/edit/";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "id", array()), "html", null, true);
                echo "\">EDIT</a>
                        <a href=\"/subject/delete/";
                // line 25
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
            // line 30
            echo "
        </table>

        <div class=\"paginationContainer\">
            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxPages"]) ? $context["maxPages"] : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 35
                echo "                <a href=\"/subject/";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["page"], "html", null, true);
                echo "</a> 
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "        </div>

    ";
        } else {
            // line 40
            echo "        <p>you must register or login to view data</p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "subjectList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 40,  131 => 37,  120 => 35,  116 => 34,  110 => 30,  91 => 25,  87 => 24,  81 => 21,  77 => 20,  73 => 19,  70 => 18,  53 => 17,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Subject List{% endblock %}

{% block content %}
    {% if userSession %}
        <table>

            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                
                <th>ACTION</th>
            </tr>

            {% for t in subjectsList %}
                <tr>
                    <td>{{loop.index}}</td>
                    <td>{{t.name}}</td>
                    <td>{{t.description}}</td>
                    
                    <td>
                        <a href=\"/subject/edit/{{t.id}}\">EDIT</a>
                        <a href=\"/subject/delete/{{t.id}}\">DELETE</a>
                    </td>

                </tr>
            {% endfor %}

        </table>

        <div class=\"paginationContainer\">
            {% for page in range(1,maxPages) %}
                <a href=\"/subject/{{page}}\">{{page}}</a> 
            {% endfor %}
        </div>

    {% else %}
        <p>you must register or login to view data</p>
    {% endif %}
{% endblock %}", "subjectList.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\subjectList.html.twig");
    }
}
