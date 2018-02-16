<?php

namespace perou\blog\controler;

use perou\blog\controler\frontend\FrontendControler;
use perou\blog\view\frontend\View;

class Router
{
    private $_router;

    public function __construct()
    {
        $this->_router = new FrontendControler();
    }

    public function routerRequete()
    {
        try 
        {
                if (isset($_GET['action']))
                {
                    if ($_GET['action'] == 'listPosts')
                    {
                        $this->_router->listPosts();
                    }
                    elseif ($_GET['action'] == 'post')
                    {
                        if (isset($_GET['post_id']) AND $_GET['post_id'] > 0)
                        {
                            $this->_router->post();
                        }
                        else
                        {
                            throw new \Exception('Pas d\'identifiant d\'article envoy�');
                        }
                    }
                    elseif ($_GET['action'] == 'addComment')
                    {
                        if (isset($_GET['post_id']) AND $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['comment_author']) AND !empty($_POST['comment']))
                            {
                                $this->_router->addComment($_GET['post_id'], $_POST['comment_author'], $_POST['comment']);
                            }
                            else
                            {
                                throw new \Exception('Tous les champs ne sont pas remplis');
                            }
                        }
                        else
                        {
                            throw new \Exception('Pas d\'id d\' article envoy�');
                        }
                    }
                    elseif ($_GET['action'] == 'modifyComment')
                    {
                        if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (isset($_POST['new_comment']))
                            {
                                $this->_router->modifyComment($_GET['post_id'], $_GET['comment_id'], $_POST['new_comment']);
                            }
                            else
                            {
                                $this->_router->enterNewComment($_GET['post_id'], $_GET['comment_id']);
                            }
                        }
                        else
                        {
                            throw new \Exception('Le commentaire ou le post n\'existe pas.');
                        }
                    }
                }
                else
                {
                    $this->_router->listPosts();
                }
        } catch (\Exception $e) {
                $errorMessage = 'Erreur : ' . $e->getMessage();
                $afficheError = new View('error');
                $afficheError->generate(array('errorMessage' => $errorMessage));
        }
    }
}