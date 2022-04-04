<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/admin_home_graph/templates/admin-home-graph-block.html.twig */
class __TwigTemplate_3cdfc9cd6b227812a554f56d9c0db2bbaa3bb9947fc79b31bcbcc38b0c06bd1a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 11];
        $filters = ["raw" => 39];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['raw'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 11
        $context["classes"] = [0 => "clear-both", 1 => "user-count-block"];
        // line 15
        echo "

";
        // line 24
        echo "

";
        // line 33
        echo "


<script>
window.onload = function () {

\tlet jsonData = ";
        // line 39
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["data"] ?? null), "graphdata2", [])));
        echo ";

var chart = new CanvasJS.Chart(\"chartContainer\", {
\ttheme:\"light2\",
\tanimationEnabled: true,
\ttitle:{
\t\ttext: \"Today’s Traffic - Ecosystem Portal\"
\t},
\taxisY :{
\t\ttitle: \"Number of Viewers\",
\t\tsuffix: \"mn\"
\t},
\ttoolTip: {
\t\tshared: \"true\"
\t},
\tlegend:{
\t\tcursor:\"pointer\",
\t\titemclick : toggleDataSeries
\t},
\tdata: [{
\t\ttype: \"spline\",
\t\tvisible: true,
\t\tshowInLegend: true,
\t\tyValueFormatString: \"##.00mn\",
\t\tname: \"User Data\",
\t\tdataPoints: jsonData
\t}]
});
chart.render();

function toggleDataSeries(e) {
\tif (typeof(e.dataSeries.visible) === \"undefined\" || e.dataSeries.visible ){
\t\te.dataSeries.visible = false;
\t} else {
\t\te.dataSeries.visible = true;
\t}
\tchart.render();
}

}
</script>


<div id=\"chartContainer\" style=\"height: 370px; width: 100%;\"></div>
<script src=\"https://canvasjs.com/assets/script/canvasjs.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/admin_home_graph/templates/admin-home-graph-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 39,  65 => 33,  61 => 24,  57 => 15,  55 => 11,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/admin_home_graph/templates/admin-home-graph-block.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\admin_home_graph\\templates\\admin-home-graph-block.html.twig");
    }
}
