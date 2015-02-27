<?php

namespace Core\TroubleTicketBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TroubleTicketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Entity\TroubleTicket');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_title_by_default()
    {
        $this->getTitle()->shouldReturn(null);
    }

    function it_title_is_mutable()
    {
        $this->setTitle('simple title');
        $this->getTitle()->shouldReturn('simple title');
    }

    function it_has_no_hash_by_default()
    {
        $this->getHash()->shouldReturn(null);
    }

    function it_hash_is_mutable()
    {
        $this->setHash();
        $this->getHash()->shouldBeString();

    }

    function it_need_admin_answer_by_default()
    {
        $this->getIsAdminAnswer()->shouldReturn(true);
    }

    function it_admin_answer_is_mutable()
    {
        $this->setIsAdminAnswer(false);
        $this->getIsAdminAnswer()->shouldReturn(false);

    }

    function it_has_no_author_email_default()
    {
        $this->getAuthorEmail()->shouldReturn(null);
    }

    function it_author_email_is_mutable()
    {
        $this->setAuthorEmail('test@mail.ru');
        $this->getAuthorEmail()->shouldReturn('test@mail.ru');
    }

    function it_has_no_author_name_default()
    {
        $this->getAuthorName()->shouldReturn(null);
    }

    function it_author_name_is_mutable()
    {
        $this->setAuthorName('Peter');
        $this->getAuthorName()->shouldReturn('Peter');
    }

    function it_has_no_body_default()
    {
        $this->getBody()->shouldReturn(null);
    }

    function it_body_is_mutable()
    {
        $this->setBody('some text');
        $this->getBody()->shouldReturn('some text');
    }

    function it_readiness_default_is_zero()
    {
        $this->getReadiness()->shouldReturn(0);
    }

    function it_readiness_is_mutable()
    {
        $this->setReadiness(20);
        $this->getReadiness()->shouldReturn(20);
    }

    function it_has_no_category_default()
    {
        $this->getCategory()->shouldReturn(null);
    }
    
    /**
     *
     * @param Core\CategoryBundle\Entity\TroubleTicketCategory $category
     */
    function it_category_is_mutable($category)
    {
        $this->setCategory($category);
        $this->getCategory()->shouldHaveType('Core\CategoryBundle\Entity\TroubleTicketCategory');
    }

    
    function it_has_no_user_default()
    {
        $this->getUser()->shouldReturn(null);
    }
    /**
     *
     * @param Application\Sonata\UserBundle\Entity\User $user
     */
    function it_user_is_mutable($user)
    {
        $this->setUser($user);
        $this->getUser()->shouldHaveType('Application\Sonata\UserBundle\Entity\User');
    }

    function it_has_no_admin_answers_by_default()
    {
        $this->getAdminAnswers();
    }
    
    function it_admin_answers_is_mutable($user)
    {
        $this->setAdminAnswers(1);
        $this->setAdminAnswers(1);
        $this->getAdminAnswers()->shouldReturn(2);
    }

    function it_has_no_manager_default()
    {
        $this->getManager()->shouldReturn(null);
    }
    /**
     *
     * @param Application\Sonata\UserBundle\Entity\User $user
     */
    function it_manager_is_mutable($user)
    {
        $this->setManager($user);
        $this->getManager()->shouldHaveType('Application\Sonata\UserBundle\Entity\User');
    }

    function it_initializes_messages_collection_by_default()
    {
        $this->getMessages()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_logs_collection_by_default()
    {
        $this->getMessages()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_watchers_collection_by_default()
    {
        $this->getMessages()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_initializes_file_collection_by_default()
    {
        $this->getMessages()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Log $log
     */
    function it_should_add_log_properly($log)
    {
        $this->addLog($log);
        $this->addLog($log);
        $this->getLogs()->shouldHaveCount(1);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Log $log
     */
    function it_should_remove_log_properly($log) {
        $this->addLog($log);
        $this->removeLog($log);
        $this->getLogs()->shouldHaveCount(0);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Message $message
     */
    function it_should_add_message_properly($message)
    {
        $this->addMessage($message);
        $this->addMessage($message);
        $this->getMessages()->shouldHaveCount(1);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Message $message
     */
    function it_should_remove_message_properly($message) {
        $this->addMessage($message);
        $this->removeMessage($message);
        $this->getMessages()->shouldHaveCount(0);
    }

    /**
     * @param Core\FileBundle\Entity\DocumentFile $file
     */
    function it_should_add_file_properly($file)
    {
        $this->addFile($file);
        $this->getFile()->shouldHaveCount(1);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Message $file
     */
    function it_should_remove_file_properly($file) {
        $this->addFile($file);
        $this->removeFile($file);
        $this->getFile()->shouldHaveCount(0);
    }

    /**
     * param Core\TroubleTicketBundle\Entity\TroubleTicket $troubleTicket
     */
    /*
    function it_should_create_owner_with_email($troubleTicket)
    {
        $troubleTicket->setOwner('dummy@mail.ru')->shouldBeCalled();
        $troubleTicket->setAuthorEmail('dummy@mail.ru');
    }*/

    /**
     * param Core\TroubleTicketBundle\Entity\TroubleTicket $troubleTicket
     */
    /*
    function it_should_call_proper_method($troubleTicket)
    {
        $troubleTicket->getStatus()->shouldBeCalled();
        $troubleTicket->getValueForKey('status');
    }*/

    
    /**
     *
     * @param Application\Sonata\UserBundle\Entity\User $user
     * @param Core\TroubleTicketBundle\Entity\Status $status
     * @param Core\TroubleTicketBundle\Entity\Priority $priority
     * @param Core\CategoryBundle\Entity\TroubleTicketCategory $category
     */
    function it_has_fluent_interface($user, $status, $priority, $category)
    {
        $date = new \DateTime();

        $this->setTitle('simple title')->shouldReturn($this);
        $this->setAuthorEmail('test@mail.ru')->shouldReturn($this);
        $this->setAuthorName('Peter')->shouldReturn($this);
        $this->setBody('some text')->shouldReturn($this);
        $this->setReadiness(20)->shouldReturn($this);
        $this->setCategory($category)->shouldReturn($this);
        $this->setStatus($status)->shouldReturn($this);
        $this->setUser($user)->shouldReturn($this);
        $this->setManager($user)->shouldReturn($this);
        $this->setPriority($priority)->shouldReturn($this);
        $this->setCreatedDateTime($date)->shouldReturn($this);
        $this->setUpdatedDateTime($date)->shouldReturn($this);
        $this->setIsAdminAnswer(true)->shouldReturn($this);
        $this->setHash()->shouldReturn($this);
    }
}


