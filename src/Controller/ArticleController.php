<?php
    namespace App\Controller;

    use App\Entity\Article;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller; //dn't work
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    
    
    // class ArticleController extends Controller {
    class ArticleController extends AbstractController {
        /**
         * @Route("/", name="article_list")
         * @Method({"GET"})
         */
        public function index(){
            // return new Response('<html><body>Hello</body></html>');


            // $articles=["Article 1", "Article 2"];
            $articles= $this->getDoctrine()->getRepository(Article::class)->findAll();

            // return $this->render('articles/index.html.twig', array ("name"=>"John"));
            return $this->render('articles/index.html.twig', array ("articles"=>$articles));
        }

        /**
         * @Route("/article/{id}", name="article_show")
         */
        public function show($id){
            $article =$this->getDoctrine()->getRepository(Article::class)->find($id);
            
            return $this->render("articles/show.html.twig", array('article'=>$article));
        }

        // /**
        //  * @Route("/article/save")
        //  */
        // public function save(){
        //     $entityManager = $this->getDoctrine()->getManager();

        //     $article = new Article();
        //     $article->setTitle('Article Two');
        //     $article->setBody('This is the body for the article two');

        //     $entityManager->persist($article);

        //     $entityManager->flush();

        //     return new Response("Saved an article with the if of".$article->getId());
        // }
    }


 