<?php

/* logout.html.twig */
class __TwigTemplate_1075b5c98becc9eb1e9fc80be5c3dc54ee24b669daf3a30193bd3632837abf05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "logout.html.twig", 1);
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
        echo "Logout";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <p>You've been logged out, <a href=\"/\">click to continue</a>.</p>
";
    }

    public function getTemplateName()
    {
        return "logout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Logout{% endblock %}

{% block content %}
    <p>You've been logged out, <a href=\"/\">click to continue</a>.</p>
{% endblock %}", "logout.html.twig", "C:\\xampp\\htdocs\\slimTodo\\templates\\logout.html.twig");
    }
}
