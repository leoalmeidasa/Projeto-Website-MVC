<?php

namespace Source\App;

use CoffeeCode\Paginator\Paginator;
use Source\Core\Controller;

/**
 * Class Web
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("home",[
            "head" => $head,
            "video"=> "su4Q6Y6H_rY"
        ]);
    }

    /**
     * ABOUT
     */
    public function about(): void
    {
        $head = $this->seo->render(
            "DEscubra o " . CONF_SITE_NAME . " - " . CONF_SITE_DESC,
            CONF_SITE_DESC,
            url("/sobre"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("about",[
            "head" => $head,
            "video"=> "su4Q6Y6H_rY"
        ]);
    }

    /**
     * @param array|null $data
     */
    public function blog(?array $data): void
    {
        $head = $this->seo->render(
            "Blog" . CONF_SITE_NAME,
            "COnfira em nosso blog dicas e sacadas de como controlar melhor suas contas!",
            url("/blog"),
            theme("/assets/images/share.jpg")
        );

        $pager = new Paginator(url("/blog/page/"));
        $pager->pager(100, 10, ($data['page'] ?? 1));

        echo $this->view->render("blog", [
            "head" => $head,
            "paginator" => $pager->render()
        ]);
    }

    /**
     * @param array $data
     */
    public function blogPost(array $data): void
    {
        $postName = $data['postName'];

        $head = $this->seo->render(
            "POST NAME -" . CONF_SITE_NAME,
            "POST DEADLINE",
            url("/blog/{$postName}"),
            theme("BLOG IMAGE")

        );

        echo $this->view->render("blog-post",[
            "head" => $head,
            "data"=> $this->seo->data()
        ]);
    }


    /**
     * AUTH LOGIN
     */
    public function login(): void
    {
        $head = $this->seo->render(
            "Entrar" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/login"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("auth-login",[
            "head" => $head
        ]);
    }

    /**
     * AUTH FORGET
     */
    public function forget(): void
    {
        $head = $this->seo->render(
            "Recuperar Senha" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/recuperar"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("auth-forget",[
            "head" => $head
        ]);
    }

    /**
     * AUTH REGISTER
     */
    public function register(): void
    {
        $head = $this->seo->render(
            "Cadastrar" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("auth-register",[
            "head" => $head
        ]);
    }

    /**
     * REGISTER CONFIRM
     */
    public function confirm(): void
    {
        $head = $this->seo->render(
            "Confirmação" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/confirma"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("optin-confirm",[
            "head" => $head
        ]);
    }

    /**
     * LOGIN SUCCESS
     */
    public function success(): void
    {
        $head = $this->seo->render(
            "Bem vindo(a)" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/obrigado"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("optin-success",[
            "head" => $head
        ]);
    }

    /**
     * TERMS
     */
    public function terms(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . "termos de uso",
            CONF_SITE_DESC,
            url("/termos"),
            theme("/assets/images/share.jpg")

        );

        echo $this->view->render("terms",[
            "head" => $head
        ]);
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code ="Ops";
                $error->title = "Estamos enfrentando problemas";
                $error->message = "Estamos passando por problemas tecnicos";
                $error->linkTitle = "Enviar E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "Ops";
                $error->title = "Desculpe estamos em manutenção";
                $error->message = "Estamos passando por problemas tecnicos";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ops: conteudo insdiponivel";
                $error->message = "Estamos passando por problemas tecnicos";
                $error->linkTitle = "continue navegando!";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error",[
            "head" => $head,
            "error" =>$error
        ]);
    }

}