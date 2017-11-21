<?php

/* student_addedit.html.twig */
class __TwigTemplate_394036cfcd048429a9ec38f44d376ba1987a70938acb9e8ed547ddde59e9ac63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "student_addedit.html.twig", 1);
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
        echo "Add Student";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"fname\">first name :</label>
        <input type=\"text\" name=\"firstName\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "firstName", array()), "html", null, true);
        echo "\" placeholder=\"first name..\"><br>
        
        <label for=\"lname\">last name :</label>
        <input type=\"text\" name=\"lastName\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "lastName", array()), "html", null, true);
        echo "\" placeholder=\"last name..\"><br>
        
        <label for=\"email\">email :</label>
        <input type=\"email\" name=\"email\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "email", array()), "html", null, true);
        echo "\" placeholder=\"email..\"><br>
        
        <label for=\"image\">image :</label>
        <input type=\"file\" name=\"image\"><br>
        
        ";
        // line 19
        if ($this->getAttribute((isset($context["v"]) ? $context["v"] : null), "imagePath", array())) {
            // line 20
            echo "            <img width=\"70\" src=\"/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "imagePath", array()), "html", null, true);
            echo "\">
        ";
        }
        // line 22
        echo "        <input type=\"submit\" value=\"add student\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "student_addedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 22,  64 => 20,  62 => 19,  54 => 14,  48 => 11,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Add Student{% endblock %}

{% block content %}
    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"fname\">first name :</label>
        <input type=\"text\" name=\"firstName\" value=\"{{v.firstName}}\" placeholder=\"first name..\"><br>
        
        <label for=\"lname\">last name :</label>
        <input type=\"text\" name=\"lastName\" value=\"{{v.lastName}}\" placeholder=\"last name..\"><br>
        
        <label for=\"email\">email :</label>
        <input type=\"email\" name=\"email\" value=\"{{v.email}}\" placeholder=\"email..\"><br>
        
        <label for=\"image\">image :</label>
        <input type=\"file\" name=\"image\"><br>
        
        {% if v.imagePath %}
            <img width=\"70\" src=\"/{{v.imagePath}}\">
        {% endif %}
        <input type=\"submit\" value=\"add student\">
    </form>
{% endblock %}
", "student_addedit.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\student_addedit.html.twig");
    }
}
