<?php

/* CoreCommonBundle:Pages:index2.html.twig */
class __TwigTemplate_d22124fc925f218126bee9c369bd00ee3229c4756ba557c97a8bd5435807d1c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout2.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'js_head' => array($this, 'block_js_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "PromoMaster.net — интернет-магазин игрушек и детских товаров";
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Детские игрушки, транспорт, куклы, машинки, детские товары";
    }

    // line 6
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Интернет-магазин детских товаров, где можно купить игрушки, самокаты, радионяни, бутылочки.";
    }

    // line 8
    public function block_js_head($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "

    <script type=\"text/javascript\">
        jQuery(document).ready(function () {
            App.initSliders();
            ParallaxSlider.initParallaxSlider();
        });
    </script>

";
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "    <!--=== Slider ===-->
    <div class=\"slider-inner\">
        <div id=\"da-slider\" class=\"da-slider\">
            <div class=\"da-slide\">
                <h2><i>CLEAN &amp; FRESH</i> <br/> <i>FULLY RESPONSIVE</i> <br/> <i>DESIGN</i></h2>

                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i> <br/> <i>veniam omnis </i></p>

                <div class=\"da-img\"><img class=\"img-responsive\" src=\"/assets/plugins/parallax-slider/img/1.png\" alt=\"\">
                </div>
            </div>
            <div class=\"da-slide\">
                <h2><i>RESPONSIVE VIDEO</i> <br/> <i>SUPPORT AND</i> <br/> <i>MANY MORE</i></h2>

                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i></p>

                <div class=\"da-img\">
                    <iframe src=\"http://player.vimeo.com/video/47911018\" width=\"530\" height=\"300\" frameborder=\"0\"
                            webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            </div>
            <div class=\"da-slide\">
                <h2><i>USING BEST WEB</i> <br/> <i>SOLUTIONS WITH</i> <br/> <i>HTML5/CSS3</i></h2>

                <p><i>Lorem ipsum dolor amet</i> <br/> <i>tempor incididunt ut</i> <br/> <i>veniam omnis </i></p>

                <div class=\"da-img\"><img src=\"/assets/plugins/parallax-slider/img/html5andcss3.png\" alt=\"image01\"/></div>
            </div>
            <div class=\"da-arrows\">
                <span class=\"da-arrows-prev\"></span>
                <span class=\"da-arrows-next\"></span>
            </div>
        </div>
    </div><!--/slider-->
    <!--=== End Slider ===-->

    <!--=== Purchase Block ===-->
    <div class=\"purchase\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-9 animated fadeInLeft\">
                    <span>Unify is a clean and fully responsive incredible Template.</span>

                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Ut
                        non libero magna fusce condimentum eleifend enim a feugiat corrupti quos.</p>
                </div>
                <div class=\"col-md-3 btn-buy animated fadeInRight\">
                    <a href=\"#\" class=\"btn-u btn-u-lg\"><i class=\"fa fa-cloud-download\"></i> Download Now</a>
                </div>
            </div>
        </div>
    </div><!--/row-->
    <!-- End Purchase Block -->

    <!--=== Content Part ===-->
    <div class=\"container content\">
        <!-- Service Blocks -->
        <div class=\"row margin-bottom-30\">
            <div class=\"col-md-4\">
                <div class=\"service\">
                    <i class=\"fa fa-compress service-icon\"></i>

                    <div class=\"desc\">
                        <h4>Fully Responsive</h4>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                            tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"service\">
                    <i class=\"fa fa-cogs service-icon\"></i>

                    <div class=\"desc\">
                        <h4>HTML5 + CSS3</h4>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                            tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"service\">
                    <i class=\"fa fa-rocket service-icon\"></i>

                    <div class=\"desc\">
                        <h4>Launch Ready</h4>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                            tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service Blokcs -->

        <!-- Recent Works -->
        <div class=\"headline\"><h2>Recent Works</h2></div>
        <div class=\"row margin-bottom-20\">
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"thumbnails thumbnail-style thumbnail-kenburn\">
                    <div class=\"thumbnail-img\">
                        <div class=\"overflow-hidden\">
                            <img class=\"img-responsive\" src=\"/assets/img/masonry/blog1.jpg\" alt=\"\">
                        </div>
                        <a class=\"btn-more hover-effect\" href=\"#\">read more +</a>
                    </div>
                    <div class=\"caption\">
                        <h3><a class=\"hover-effect\" href=\"#\">Project One</a></h3>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam
                            porta sem.</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"thumbnails thumbnail-style thumbnail-kenburn\">
                    <div class=\"thumbnail-img\">
                        <div class=\"overflow-hidden\">
                            <img class=\"img-responsive\" src=\"/assets/img/masonry/blog2.jpg\" alt=\"\">
                        </div>
                        <a class=\"btn-more hover-effect\" href=\"#\">read more +</a>
                    </div>
                    <div class=\"caption\">
                        <h3><a class=\"hover-effect\" href=\"#\">Project Two</a></h3>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam
                            porta sem.</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"thumbnails thumbnail-style thumbnail-kenburn\">
                    <div class=\"thumbnail-img\">
                        <div class=\"overflow-hidden\">
                            <img class=\"img-responsive\" src=\"/assets/img/masonry/blog3.jpg\" alt=\"\">
                        </div>
                        <a class=\"btn-more hover-effect\" href=\"#\">read more +</a>
                    </div>
                    <div class=\"caption\">
                        <h3><a class=\"hover-effect\" href=\"#\">Project Three</a></h3>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam
                            porta sem.</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"thumbnails thumbnail-style thumbnail-kenburn\">
                    <div class=\"thumbnail-img\">
                        <div class=\"overflow-hidden\">
                            <img class=\"img-responsive\" src=\"/assets/img/masonry/blog4.jpg\" alt=\"\">
                        </div>
                        <a class=\"btn-more hover-effect\" href=\"#\">read more +</a>
                    </div>
                    <div class=\"caption\">
                        <h3><a class=\"hover-effect\" href=\"#\">Project Four</a></h3>

                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam
                            porta sem.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Recent Works -->

        <!-- Info Blokcs -->
        <div class=\"row margin-bottom-30\">
            <!-- Welcome Block -->
            <div class=\"col-md-8 md-margin-bottom-40\">
                <div class=\"headline\"><h2>Welcome To Unify</h2></div>
                <div class=\"row\">
                    <div class=\"col-sm-4\">
                        <img class=\"img-responsive margin-bottom-20\" src=\"/assets/img/main/21.jpg\" alt=\"\">
                    </div>
                    <div class=\"col-sm-8\">
                        <p>Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative
                            professionals. It works on all major web browsers, tablets and phone.</p>
                        <ul class=\"list-unstyled margin-bottom-20\">
                            <li><i class=\"fa fa-check color-green\"></i> Donec id elit non mi porta gravida</li>
                            <li><i class=\"fa fa-check color-green\"></i> Corporate and Creative</li>
                            <li><i class=\"fa fa-check color-green\"></i> Responsive Bootstrap Template</li>
                            <li><i class=\"fa fa-check color-green\"></i> Corporate and Creative</li>
                        </ul>
                    </div>
                </div>

                <blockquote class=\"hero-unify\">
                    <p>Award winning digital agency. We bring a personal and effective approach to every project we work
                        on, which is why. Unify is an incredibly beautiful responsive Bootstrap Template for corporate
                        professionals.</p>
                    <small>CEO, Jack Bour</small>
                </blockquote>
            </div>
            <!--/col-md-8-->

            <!-- Latest Shots -->
            <div class=\"col-md-4\">
                <div class=\"headline\"><h2>Latest Shots</h2></div>
                <div id=\"myCarousel\" class=\"carousel slide carousel-v1\">
                    <div class=\"carousel-inner\">
                        <div class=\"item active\">
                            <img src=\"/assets/img/main/23.jpg\" alt=\"\">

                            <div class=\"carousel-caption\">
                                <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"/assets/img/main/22.jpg\" alt=\"\">

                            <div class=\"carousel-caption\">
                                <p>Cras justo odio, dapibus ac facilisis into egestas.</p>
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"/assets/img/main/24.jpg\" alt=\"\">

                            <div class=\"carousel-caption\">
                                <p>Justo cras odio apibus ac afilisis lingestas de.</p>
                            </div>
                        </div>
                    </div>

                    <div class=\"carousel-arrow\">
                        <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
                            <i class=\"fa fa-angle-left\"></i>
                        </a>
                        <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
                            <i class=\"fa fa-angle-right\"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--/col-md-4-->
        </div>
        <!-- End Info Blokcs -->

        <!-- Our Clients -->
        <div id=\"clients-flexslider\" class=\"flexslider home clients\">
            <div class=\"headline\"><h2>Our Clients</h2></div>
            <ul class=\"slides\">
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/hp_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/hp.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/igneus_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/igneus.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/vadafone_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/vadafone.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/walmart_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/walmart.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/shell_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/shell.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/natural_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/natural.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/aztec_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/aztec.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/gamescast_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/gamescast.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/cisco_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/cisco.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/everyday_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/everyday.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/cocacola_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/cocacola.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/spinworkx_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/spinworkx.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/shell_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/shell.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/natural_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/natural.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/gamescast_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/gamescast.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/everyday_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/everyday.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <img src=\"/assets/img/clients/spinworkx_grey.png\" alt=\"\">
                        <img src=\"/assets/img/clients/spinworkx.png\" class=\"color-img\" alt=\"\">
                    </a>
                </li>
            </ul>
        </div>
        <!--/flexslider-->
        <!-- End Our Clients -->
    </div><!--/container-->
    <!-- End Content Part -->

";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:index2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 21,  76 => 20,  61 => 9,  58 => 8,  52 => 6,  46 => 5,  40 => 4,  11 => 1,);
    }
}
