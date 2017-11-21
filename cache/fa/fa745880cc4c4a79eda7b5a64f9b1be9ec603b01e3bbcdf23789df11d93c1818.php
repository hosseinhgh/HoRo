<?php

/* subject_addedit.html.twig */
class __TwigTemplate_97d77d46cc82708da8df8f3c0c935c366c319fcbf25ce7abbca76577eea1aa13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "subject_addedit.html.twig", 1);
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
        echo "Add Subject";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"name\">Name :</label>
        <input type=\"text\" name=\"name\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "name", array()), "html", null, true);
        echo "\" placeholder=\"name..\"><br>
        
        <label for=\"description\">Description :</label>
        <input type=\"text\" name=\"description\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "description", array()), "html", null, true);
        echo "\" placeholder=\"description..\"><br>
        
        
        <input type=\"submit\" value=\"add subject\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "subject_addedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 11,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Add Subject{% endblock %}

{% block content %}
    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"name\">Name :</label>
        <input type=\"text\" name=\"name\" value=\"{{v.name}}\" placeholder=\"name..\"><br>
        
        <label for=\"description\">Description :</label>
        <input type=\"text\" name=\"description\" value=\"{{v.description}}\" placeholder=\"description..\"><br>
        
        
        <input type=\"submit\" value=\"add subject\">
    </form>
{% endblock %}
", "subject_addedit.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\subject_addedit.html.twig");
    }
}
