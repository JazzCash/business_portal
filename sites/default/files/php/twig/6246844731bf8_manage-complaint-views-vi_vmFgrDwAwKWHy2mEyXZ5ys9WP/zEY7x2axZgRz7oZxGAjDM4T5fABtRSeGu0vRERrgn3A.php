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

/* modules/custom/jazz_complaint/templates/views/manage-complaint-views-view.html.twig */
class __TwigTemplate_ac217718c679aaff627cd497cc0c097b8f1c7fe7fc6bc0aed076a1d3f38cd960 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 37, "if" => 49];
        $filters = ["escape" => 35, "clean_class" => 39];
        $functions = ["attach_library" => 35];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'clean_class'],
                ['attach_library']
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
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("jazz_help_articles/jazz_home_article"), "html", null, true);
        echo "
";
        // line 37
        $context["classes"] = [0 => "view", 1 => ("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 39
($context["id"] ?? null)))), 2 => ("view-id-" . $this->sandbox->ensureToStringAllowed(        // line 40
($context["id"] ?? null))), 3 => ("view-display-id-" . $this->sandbox->ensureToStringAllowed(        // line 41
($context["display_id"] ?? null))), 4 => ((        // line 42
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null)))) : ("")), 5 => "manage_complaints-views-view", 6 => ((        // line 44
($context["dom_id"] ?? null)) ? (("manage_complaints-js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null)))) : (""))];
        // line 47
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
\t";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null)), "html", null, true);
        echo "
\t";
        // line 49
        if (($context["title"] ?? null)) {
            // line 50
            echo "\t\t";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
            echo "
\t";
        }
        // line 52
        echo "\t";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null)), "html", null, true);
        echo "
\t";
        // line 53
        if (($context["header"] ?? null)) {
            // line 54
            echo "\t\t<div class=\"view-header\">
\t\t\t";
            // line 55
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 58
        echo "\t";
        if (($context["exposed"] ?? null)) {
            // line 59
            echo "\t\t<div class=\"view-filters jazz-complaint-search-form form-group\">
\t\t\t";
            // line 60
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 63
        echo "\t<table class=\"header-table\">
\t\t<thead>
        \t<tr>
            \t<th>Ticket details</th>
            \t<th>Customer name</th>
            \t<th>Date</th>
            \t<th>Priority</th>
        \t</tr>
    \t</thead>
\t</table>
\t";
        // line 73
        if (($context["attachment_before"] ?? null)) {
            // line 74
            echo "\t\t<div class=\"attachment attachment-before\">
\t\t\t";
            // line 75
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 78
        echo "
\t";
        // line 79
        if (($context["rows"] ?? null)) {
            // line 80
            echo "\t\t<div class=\"view-content\">
\t\t\t";
            // line 81
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        } elseif (        // line 83
($context["empty"] ?? null)) {
            // line 84
            echo "\t\t<div class=\"view-empty\">
\t\t\t";
            // line 85
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 88
        echo "
\t";
        // line 89
        if (($context["pager"] ?? null)) {
            // line 90
            echo "\t\t";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null)), "html", null, true);
            echo "
\t";
        }
        // line 92
        echo "\t";
        if (($context["attachment_after"] ?? null)) {
            // line 93
            echo "\t\t<div class=\"attachment attachment-after\">
\t\t\t";
            // line 94
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 97
        echo "\t";
        if (($context["more"] ?? null)) {
            // line 98
            echo "\t\t";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null)), "html", null, true);
            echo "
\t";
        }
        // line 100
        echo "\t";
        if (($context["footer"] ?? null)) {
            // line 101
            echo "\t\t<div class=\"view-footer\">
\t\t\t";
            // line 102
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 105
        echo "\t";
        if (($context["feed_icons"] ?? null)) {
            // line 106
            echo "\t\t<div class=\"feed-icons\">
\t\t\t";
            // line 107
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 110
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jazz_complaint/templates/views/manage-complaint-views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 110,  208 => 107,  205 => 106,  202 => 105,  196 => 102,  193 => 101,  190 => 100,  184 => 98,  181 => 97,  175 => 94,  172 => 93,  169 => 92,  163 => 90,  161 => 89,  158 => 88,  152 => 85,  149 => 84,  147 => 83,  142 => 81,  139 => 80,  137 => 79,  134 => 78,  128 => 75,  125 => 74,  123 => 73,  111 => 63,  105 => 60,  102 => 59,  99 => 58,  93 => 55,  90 => 54,  88 => 53,  83 => 52,  77 => 50,  75 => 49,  71 => 48,  66 => 47,  64 => 44,  63 => 42,  62 => 41,  61 => 40,  60 => 39,  59 => 37,  55 => 35,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/jazz_complaint/templates/views/manage-complaint-views-view.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\jazz_complaint\\templates\\views\\manage-complaint-views-view.html.twig");
    }
}
