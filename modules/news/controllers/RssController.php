<?php

class News_RssController extends Application_Controllers_Action
{
    public function indexAction() {
        $config = Zend_Registry::get('config');

        $model_news = new News();
        $news = $model_news->fetchAll($model_news->select()->order('tsregister DESC'));
        
        $url = $this->request->getScheme() . '://' . $this->request->getHttpHost();

        $feed = new Zend_Feed_Writer_Feed();
        $feed->setTitle($config->system->name);
        $feed->setLink($url);
        $feed->setDescription('Canal de actualización de novedades del evento');

        foreach ($news as $new) {
            $entry = $feed->createEntry();
            
            $entry->setTitle($new->title);
            $entry->setLink($url . $this->view->url(array('new' => $new->ident), 'news_new_view'));
            $entry->setDateModified($new->tsmodified);
            $entry->setDateCreated($new->tsregister);
            $entry->setDescription($this->view->wrapper($new->text, 10));
            $entry->setContent($new->text);

            $entry->addAuthor(array('name' => $new->getAuthor()->getFullname()));
            $feed->addEntry($entry);
        }

        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        $response->setBody($feed->export('rss'));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
