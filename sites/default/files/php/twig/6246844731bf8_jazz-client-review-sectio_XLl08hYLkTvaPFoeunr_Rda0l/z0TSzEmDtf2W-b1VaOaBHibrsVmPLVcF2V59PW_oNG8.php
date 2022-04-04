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

/* modules/custom/jazz_client_review_section/templates/jazz-client-review-section.html.twig */
class __TwigTemplate_0261d539664bce8faab0262bde352f167acdd795f9fa9ff68fc73d4e9a861405 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 4];
        $filters = ["escape" => 8, "raw" => 19];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'raw'],
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
        // line 1
        echo "<!-- Add you custom twig html here -->
<h1>Don’t take our word for it.</h1>
<div class=\"clients-review-section\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "content", []));
        foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
            // line 5
            echo "        <div class=\"clients-container\">
            <div class=\"clients-review-fch\">
            <div class=\"client-img\">
                <img class=\"img\" src=\"";
            // line 8
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "image", [])), "html", null, true);
            echo "\">
            </div>
            <div class=\"title\">
                <h1 class=\"name\">";
            // line 11
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "title", [])), "html", null, true);
            echo "</h1>
                <p>";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "city", [])), "html", null, true);
            echo "</p>
            </div>
            <div class=\"rating-client\">
                <p>";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "rating", [])), "html", null, true);
            echo "</p>
            </div>
            </div>
            <div class=\"clients-review-discription\">
                <p>";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["content"], "body", [])));
            echo "</p>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/jazz_client_review_section/templates/jazz-client-review-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 23,  92 => 19,  85 => 15,  79 => 12,  75 => 11,  69 => 8,  64 => 5,  60 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/jazz_client_review_section/templates/jazz-client-review-section.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\jazz_client_review_section\\templates\\jazz-client-review-section.html.twig");
    }
}
