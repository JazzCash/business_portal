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

/* modules/custom/cmssections/templates/cms-sections-block.html.twig */
class __TwigTemplate_34ecbf4a80dea7c648dead3b8cb5c72e28aedb9c3082a8196895660bd6e77887 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 11, "for" => 20];
        $filters = ["escape" => 19];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
                ['escape'],
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
        $context["classes"] = [0 => "clear-both"];
        // line 14
        echo "<div class=\"cms-contianer\">
<div class=\"cms-title\">
<h2>CMS - Sections </h2>
</div>
<div class=\"lins-cms\">
<ul";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 21
            echo "\t\t\t<li class=\"jazz-module ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute($context["module"], "active", []) == true)) ? (" active") : (" ")));
            echo "\">
\t\t\t<span>
\t\t\t\t<svg class=\"";
            // line 23
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($this->getAttribute($context["module"], "active", []) == true)) ? ("") : ("hidden")));
            echo "\" width=\"12\" height=\"9\" viewBox=\"0 0 12 9\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t<path d=\"M1 5L3.92929 7.92929C3.96834 7.96834 4.03166 7.96834 4.07071 7.92929L11 1\" stroke=\"white\" stroke-width=\"1.7\" stroke-linecap=\"round\"/>
\t\t\t\t</svg>
\t\t\t</span>
\t\t\t\t";
            // line 27
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["module"], "label", [])), "html", null, true);
            echo "
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t</ul>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/cmssections/templates/cms-sections-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 30,  85 => 27,  78 => 23,  72 => 21,  68 => 20,  64 => 19,  57 => 14,  55 => 11,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/cmssections/templates/cms-sections-block.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\cmssections\\templates\\cms-sections-block.html.twig");
    }
}
