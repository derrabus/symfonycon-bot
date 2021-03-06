<?php

declare(strict_types=1);

namespace App\ChatBot\Replier;

use App\ChatBot\Reply;
use App\ChatBot\Telegram\Data\Envelope;

class HelpReplier implements ReplierInterface
{
    public function supports(Envelope $envelope): bool
    {
        return '/help' === $envelope->getMessage()->text;
    }

    public function reply(Envelope $envelope): Reply
    {
        $help = <<<HELP
            *SymfonyConBot Help*
            This bot will help you to keep on track with all talks at SymfonyCon 2019 in Amsterdam.
            
            *Until SymfonyCon starts:*
            /countdown - time until SymfonyCon starts
            /day1 - lists all talks of the first day
            /day2 - lists all talks of the second day
            
            *While SymfonyCon:*
            /today - lists all talks of today
            /now - lists all talks happening right now
            /next - lists all talks happening next slot
            
            *About SymfonyConBot:*
            Written with Symfony 5 and Notifier
            Checkout [GitHub](github.com/chr-hertel/symfonycon-bot) for more...
            HELP;

        return new Reply($help);
    }
}
