<?php

namespace Template\Site;

use Core\Config;
use Core\Plugin\Plugin;

class Extended implements iSite {
    protected $config = ["template" => [], "plugin" => [], "css" => ["pre" => [], "post" => []], "js" => ["pre" => [], "post" => []]];

	public function Init() {

	}

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
            $this->config["js"][$type][] = $files;
    }

    public function AddPlugin($plugins)
    {
        if(is_array($plugins))
            foreach($plugins as $plugin)
                $this->config["plugin"][] = ["name" => $plugin];
        else
            $this->config["plugin"][] = ["name" => $plugins];
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
            $this->config["css"][$type][] = $files;

    }

    public function GetJavascriptPath($file)
    {
        return ROOT."/web/".Config::GetWebsiteConfig()["local_name"]."/assets/js/".$file;
    }

    public function GetCSSPath($file)
    {
        return ROOT."/web/".Config::GetWebsiteConfig()["local_name"]."/assets/css/".$file;
    }

    public function GetConfig(){
	    return $this->config;
    }

    public function RunPlugins(){
	    foreach($this->config["plugin"] as $key => $plugin_data){
            {

                $plugin = new Plugin($plugin_data["name"]);
                foreach($plugin->GetJavascript() as $js => $key){
                    print_r($js);
                }
            }
        }
    }

    public function AddTemplate(){

    }
}
