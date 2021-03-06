<?php
/**
 * @package midgardmvc_helper_forms
 * @author The Midgard Project, http://www.midgard-project.org
 * @copyright The Midgard Project, http://www.midgard-project.org
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 */
class midgardmvc_helper_forms_field_integer extends midgardmvc_helper_forms_field
{
    public function __toString()
    {
        return "".$this->value;
    }

    public function validate()
    {
        // if value is NOT required and it is left empy, validate as true
        if (isset($this->required) && $this->required == false && mb_strlen($this->value) == 0)
        {
            return;
        }
        
        if ($this->value != filter_var($this->value, FILTER_VALIDATE_INT))
        {
            $message = $this->mvc->i18n->get('Value is not an integer', 'midgardmvc_helper_forms');
            throw new midgardmvc_helper_forms_exception_validation($message." ({$this->name})");         
        }
    }
    
    public function clean()
    {
        $this->value = (int)$this->value;
    }



        
}

?>
