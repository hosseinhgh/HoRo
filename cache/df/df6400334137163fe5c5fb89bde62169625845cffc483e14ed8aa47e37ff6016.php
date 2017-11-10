<?php

/* todo_addedit.html.twig */
class __TwigTemplate_48e0a97bfa5af125472eb682a1f9b8cd6ab5d5143acae06a0dfa7e6c3936eecd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "todo_addedit.html.twig", 1);
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
        echo "Add todo";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "task", array()), "html", null, true);
        echo "\"><br>
        Due date <input type=\"date\" name=\"dueDate\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "dueDate", array()), "html", null, true);
        echo "\"><br>
        Is done: <input type=\"checkbox\" name=\"isDone\" ";
        // line 9
        echo "><br>
        <input type=\"submit\" value=\"Add todo\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "todo_addedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 9,  45 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Add todo{% endblock %}

{% block content %}
    <form method=\"post\">
        Task: <input type=\"text\" name=\"task\" value=\"{{v.task}}\"><br>
        Due date <input type=\"date\" name=\"dueDate\" value=\"{{v.dueDate}}\"><br>
        Is done: <input type=\"checkbox\" name=\"isDone\" {# TODO checked #}><br>
        <input type=\"submit\" value=\"Add todo\">
    </form>
{% endblock %}", "todo_addedit.html.twig", "C:\\xampp\\htdocs\\ipd\\slimtodo\\templates\\todo_addedit.html.twig");
    }
}
