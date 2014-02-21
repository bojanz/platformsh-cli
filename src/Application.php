<?php

namespace CommerceGuys\Platform\Cli;

use CommerceGuys\Platform\Cli\Command\InitCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentBackupCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentBranchCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentDeleteCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentListCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentMergeCommand;
use CommerceGuys\Platform\Cli\Command\EnvironmentSynchronizeCommand;
use CommerceGuys\Platform\Cli\Command\GetCommand;
use CommerceGuys\Platform\Cli\Command\ProjectDeleteCommand;
use CommerceGuys\Platform\Cli\Command\ProjectListCommand;
use CommerceGuys\Platform\Cli\Command\SshKeyAddCommand;
use CommerceGuys\Platform\Cli\Command\SshKeyDeleteCommand;
use CommerceGuys\Platform\Cli\Command\SshKeyListCommand;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Shell;


class Application extends BaseApplication {

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct('Platform Cli', '0.1');

        $this->getDefinition()->addOption(new InputOption('--shell', '-s', InputOption::VALUE_NONE, 'Launch the shell.'));

        $this->add(new InitCommand);
        $this->add(new GetCommand);
        $this->add(new EnvironmentBackupCommand);
        $this->add(new EnvironmentBranchCommand);
        $this->add(new EnvironmentDeleteCommand);
        $this->add(new EnvironmentListCommand);
        $this->add(new EnvironmentMergeCommand);
        $this->add(new EnvironmentSynchronizeCommand);
        $this->add(new ProjectDeleteCommand);
        $this->add(new ProjectListCommand);
        $this->add(new SshKeyAddCommand);
        $this->add(new SshKeyDeleteCommand);
        $this->add(new SshKeyListCommand);
    }

    /**
     * {@inheritdoc}
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        if (true === $input->hasParameterOption(array('--shell', '-s'))) {
            $shell = new Shell($this);
            $shell->run();

            return 0;
        }

        return parent::doRun($input, $output);
    }

}