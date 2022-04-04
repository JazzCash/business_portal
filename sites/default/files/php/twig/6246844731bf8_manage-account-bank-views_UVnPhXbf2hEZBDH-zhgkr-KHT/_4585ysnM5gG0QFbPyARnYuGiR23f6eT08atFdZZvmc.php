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

/* modules/custom/jazz_manage_bank_account_status/templates/views/manage-account-bank-views-view.html.twig */
class __TwigTemplate_6b59084505724a1e5c0bc51d818f1e009d8f0e9be6ec7d165f16bc037051636e extends \Twig\Template
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
        echo "\t";
        if (($context["attachment_before"] ?? null)) {
            // line 64
            echo "\t\t<div class=\"attachment attachment-before\">
\t\t\t";
            // line 65
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 68
        echo "
\t";
        // line 69
        if (($context["rows"] ?? null)) {
            // line 70
            echo "\t\t<div class=\"view-content\">
\t\t\t<table class=\"user-table\">
\t\t\t<thead>
        \t<tr>
            \t<th>Name</th>
            \t<th>Created</th>
            \t<th>Status</th>
        \t</tr>
    \t</thead>
\t\t\t";
            // line 79
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null)), "html", null, true);
            echo "
\t\t\t</table>
\t\t</div>
\t";
        } elseif (        // line 82
($context["empty"] ?? null)) {
            // line 83
            echo "\t\t<div class=\"view-empty\">
\t\t\t";
            // line 84
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 87
        echo "
\t";
        // line 88
        if (($context["pager"] ?? null)) {
            // line 89
            echo "\t\t";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null)), "html", null, true);
            echo "
\t";
        }
        // line 91
        echo "\t";
        if (($context["attachment_after"] ?? null)) {
            // line 92
            echo "\t\t<div class=\"attachment attachment-after\">
\t\t\t";
            // line 93
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 96
        echo "\t";
        if (($context["more"] ?? null)) {
            // line 97
            echo "\t\t";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null)), "html", null, true);
            echo "
\t";
        }
        // line 99
        echo "\t";
        if (($context["footer"] ?? null)) {
            // line 100
            echo "\t\t<div class=\"view-footer\">
\t\t\t";
            // line 101
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 104
        echo "\t";
        if (($context["feed_icons"] ?? null)) {
            // line 105
            echo "\t\t<div class=\"feed-icons\">
\t\t\t";
            // line 106
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null)), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 109
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/jazz_manage_bank_account_status/templates/views/manage-account-bank-views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 109,  206 => 106,  203 => 105,  200 => 104,  194 => 101,  191 => 100,  188 => 99,  182 => 97,  179 => 96,  173 => 93,  170 => 92,  167 => 91,  161 => 89,  159 => 88,  156 => 87,  150 => 84,  147 => 83,  145 => 82,  139 => 79,  128 => 70,  126 => 69,  123 => 68,  117 => 65,  114 => 64,  111 => 63,  105 => 60,  102 => 59,  99 => 58,  93 => 55,  90 => 54,  88 => 53,  83 => 52,  77 => 50,  75 => 49,  71 => 48,  66 => 47,  64 => 44,  63 => 42,  62 => 41,  61 => 40,  60 => 39,  59 => 37,  55 => 35,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/jazz_manage_bank_account_status/templates/views/manage-account-bank-views-view.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\jazz_manage_bank_account_status\\templates\\views\\manage-account-bank-views-view.html.twig");
    }
}
