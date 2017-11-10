<?php

/* index.html.twig */
class __TwigTemplate_e16371dd43bfeac20bdb9bbb398aedf062ceba023825fc407025c14042464ac0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "index.html.twig", 1);
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
        echo "Index";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ((isset($context["userSession"]) ? $context["userSession"] : null)) {
            // line 7
            echo "        <table border=\"1\">
            <tr><th>#</th><th>task description</th><th>due date</th><th>is done</th><th>actions</th></tr>
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["todoList"]) ? $context["todoList"] : null));
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
                // line 10
                echo "            <tr>
                <td>";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "task", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "dueDate", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "isDone", array()), "html", null, true);
                echo "</td>
                <td>
                    <a href=\"/edit/";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "id", array()), "html", null, true);
                echo "\">Edit</a>
                    <a href=\"/delete/";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["t"], "id", array()), "html", null, true);
                echo "\">Delete</a>
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
            // line 21
            echo "        </table>
    ";
        } else {
            // line 23
            echo "        <p>You must register or login first to view your your data.</p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 23,  104 => 21,  86 => 17,  82 => 16,  77 => 14,  73 => 13,  69 => 12,  65 => 11,  62 => 10,  45 => 9,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Index{% endblock %}

{% block content %}
    {% if userSession %}
        <table border=\"1\">
            <tr><th>#</th><th>task description</th><th>due date</th><th>is done</th><th>actions</th></tr>
        {% for t in todoList %}
            <tr>
                <td>{{loop.index}}</td>
                <td>{{t.task}}</td>
                <td>{{t.dueDate}}</td>
                <td>{{t.isDone}}</td>
                <td>
                    <a href=\"/edit/{{t.id}}\">Edit</a>
                    <a href=\"/delete/{{t.id}}\">Delete</a>
                </td>
            </tr>
        {% endfor %}
        </table>
    {% else %}
        <p>You must register or login first to view your your data.</p>
    {% endif %}
{% endblock %}", "index.html.twig", "C:\\xampp\\htdocs\\ipd\\slimtodo\\templates\\index.html.twig");
    }
}
