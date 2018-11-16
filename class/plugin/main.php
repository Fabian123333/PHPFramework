<?php
namespace Template\Plugin;

class Plugin {
    protected $config = ["template" => [], "css" => ["pre" => [], "post" => []], "js" => ["pre" => [], "post" => []]];

    public function AddJavascript($files, $post = false, $rel_path = true)
    {
        $type = $post == false?"pre":"post";

        if(is_array($files))
            foreach($files as $file)
                if($rel_path == true)
                    $this->config["js"][$type][] = $this->GetJavascriptPath($file);
                else
                    $this->config["js"][$type][] = $file;
        else
            if($rel_path == true)
                $this->config["js"][$type][] = $this->GetJavascriptPath($files);
                else
            $this->config["js"][$type][] = $files;
    }

    public function AddCSS($files, $post = false, $rel_path = true)
    {
        $type = $post == false?"pre":"post";

        if(is_array($files))
            foreach($files as $file)
                if($rel_path == true)
                    $this->config["css"][$type][] = $this->GetCSSPath($file);
                else
                    $this->config["css"][$type][] = $file;
        else
            if($rel_path == true)
                $this->config["css"][$type][] = $this->GetCSSPath($files);
            else
                $this->config["css"][$type][] = $files;

    }

    public function GetCSSPath($file)
    {
        return __DIR__."/assets/css/".$file;
    }

    public function GetJavascriptPath($file)
    {
        return __DIR__."/assets/js/".$file;
    }

    public function GetJavascript()
    {
        return $this->config["js"];
    }
}
