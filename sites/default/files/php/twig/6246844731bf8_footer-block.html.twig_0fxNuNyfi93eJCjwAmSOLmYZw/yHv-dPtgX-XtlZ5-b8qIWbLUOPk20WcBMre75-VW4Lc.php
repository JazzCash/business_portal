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

/* modules/custom/register_iap/templates/footer-block.html.twig */
class __TwigTemplate_34e02208eed1cfc7c727cea945d7522e5fe7093b05cc1159a49061e97d43aebb extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 11, "for" => 21];
        $filters = ["escape" => 14];
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
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
    <div class=\"title-footer\">";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["data"] ?? null), 0, [], "array"), "title", [])), "html", null, true);
        echo "</div>
    <div class=\"body-footer\">";
        // line 16
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["data"] ?? null), 0, [], "array"), "body", [])), "html", null, true);
        echo "</div>
    <div class=\"img-footer\">
        <img  src=\"";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["data"] ?? null), 0, [], "array"), "image", [])), "html", null, true);
        echo "\"/>
    </div>
     <ul class=\"social-icons\">
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["data"] ?? null), 0, [], "array"), "social", []));
        foreach ($context['_seq'] as $context["_key"] => $context["social"]) {
            // line 22
            echo "        <li>
        <a href=\"";
            // line 23
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["social"], "href", [])), "html", null, true);
            echo "\">
            <img  src=\"";
            // line 24
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["social"], "icon", [])), "html", null, true);
            echo "\"/>
        </a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['social'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo " 
    </ul>
    <div>Copyright © 2021. All rights reserved.</div>
    <ul class=\"pri-section\">
    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["data"] ?? null), 0, [], "array"), "links", []));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 32
            echo "        <li>
        <a href=\"";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["link"], "href", [])), "html", null, true);
            echo "\">
            ";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["link"], "label", [])), "html", null, true);
            echo "
        </a>
            
            
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo " 
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/register_iap/templates/footer-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 39,  115 => 34,  111 => 33,  108 => 32,  104 => 31,  98 => 27,  88 => 24,  84 => 23,  81 => 22,  77 => 21,  71 => 18,  66 => 16,  62 => 15,  57 => 14,  55 => 11,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/register_iap/templates/footer-block.html.twig", "C:\\wamp64\\www\\arcana\\onboarding_18-03_22\\modules\\custom\\register_iap\\templates\\footer-block.html.twig");
    }
}
