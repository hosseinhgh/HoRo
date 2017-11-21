<?php

/* question_addedit.html.twig */
class __TwigTemplate_e4ec2ba850379bc24ab9efe653dc759e60b009b6ea03771ae7909f05da9be435 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "question_addedit.html.twig", 1);
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
        echo "Add question";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"question\"> question :</label>
        <input type=\"text\" name=\"question\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "question", array()), "html", null, true);
        echo "\" placeholder=\"question..\"><br>
        
        <label for=\"answer1\">choice1 :</label>
        <input type=\"text\" name=\"answer1\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "answer1", array()), "html", null, true);
        echo "\" placeholder=\"answer1..\"><br>
        
        <label for=\"answer2\">choice2 :</label>
        <input type=\"text\" name=\"answer2\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "answer2", array()), "html", null, true);
        echo "\" placeholder=\"answer2..\"><br>
        
        <label for=\"answer3\">choice3 :</label>
        <input type=\"text\" name=\"answer3\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "answer3", array()), "html", null, true);
        echo "\" placeholder=\"answer3..\"><br>
        
        <label for=\"answer4\">choice4 :</label>
        <input type=\"text\" name=\"answer1\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "answer4", array()), "html", null, true);
        echo "\" placeholder=\"answer4..\"><br>
        
        <label for=\"answer5\">choice5 :</label>
        <input type=\"text\" name=\"answer5\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "answer5", array()), "html", null, true);
        echo "\" placeholder=\"answer5..\"><br>
        
        <label for=\"iscorrect\">correct answer number :</label>
        <input type=\"text\" name=\"iscorrect\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "iscorrect", array()), "html", null, true);
        echo "\" placeholder=\"iscorrect..\"><br>
        
        
        
        
        <input type=\"submit\" value=\"add question\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "question_addedit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 26,  72 => 23,  66 => 20,  60 => 17,  54 => 14,  48 => 11,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Add question{% endblock %}

{% block content %}
    <form method=\"post\" enctype=\"multipart/form-data\">
        <label for=\"question\"> question :</label>
        <input type=\"text\" name=\"question\" value=\"{{v.question}}\" placeholder=\"question..\"><br>
        
        <label for=\"answer1\">choice1 :</label>
        <input type=\"text\" name=\"answer1\" value=\"{{v.answer1}}\" placeholder=\"answer1..\"><br>
        
        <label for=\"answer2\">choice2 :</label>
        <input type=\"text\" name=\"answer2\" value=\"{{v.answer2}}\" placeholder=\"answer2..\"><br>
        
        <label for=\"answer3\">choice3 :</label>
        <input type=\"text\" name=\"answer3\" value=\"{{v.answer3}}\" placeholder=\"answer3..\"><br>
        
        <label for=\"answer4\">choice4 :</label>
        <input type=\"text\" name=\"answer1\" value=\"{{v.answer4}}\" placeholder=\"answer4..\"><br>
        
        <label for=\"answer5\">choice5 :</label>
        <input type=\"text\" name=\"answer5\" value=\"{{v.answer5}}\" placeholder=\"answer5..\"><br>
        
        <label for=\"iscorrect\">correct answer number :</label>
        <input type=\"text\" name=\"iscorrect\" value=\"{{v.iscorrect}}\" placeholder=\"iscorrect..\"><br>
        
        
        
        
        <input type=\"submit\" value=\"add question\">
    </form>
{% endblock %}
", "question_addedit.html.twig", "C:\\xampp\\htdocs\\horo\\templates\\question_addedit.html.twig");
    }
}
