<?php

/* ClcDashboardBundle:default:addtodomodal.html.twig */
class __TwigTemplate_3af54dc99c0fd606de8ab4d09fe52b18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>

<div class=\"modal hide fade\" id=\"addtodomodal\" area-hidden=\"true\">

    <div class=\"modal-header\">
        <h3>Add a new to-dp</h3>
    </div>

    <div class=\"modal-body\">
        <form>
            <label>Task description</label>
            <input type=\"text\" class=\"span4\"/><br>
            <label>Due date</label>
            <input type=\"date\" class=\"span4\"/><br>
            <button type=\"submit\" class=\"btn btn-success\">Add to-do</button>
            <button type=\"reset\" class=\"btn\">Clear</button>
        </form>

    </div>

    <div class=\"modal-footer\">
        <button class=\"btn\" data-dismiss=\"modal\" area-hidden=\"true\">Close</button>
    </div>
    
</div>";
    }

    public function getTemplateName()
    {
        return "ClcDashboardBundle:default:addtodomodal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  49 => 15,  45 => 14,  41 => 13,  37 => 12,  24 => 5,  19 => 2,  74 => 20,  71 => 19,  62 => 22,  60 => 19,  47 => 11,  44 => 10,  38 => 7,  33 => 11,  30 => 5,  96 => 44,  89 => 40,  82 => 36,  78 => 35,  64 => 23,  61 => 22,  58 => 21,  55 => 16,  53 => 16,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
