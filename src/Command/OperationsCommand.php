<?php

namespace App\Command;


use App\Service\OperationService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use UnhandledMatchError;

#[AsCommand(
    name: 'operations',
    description: 'get the result of the operation between two numbers. example: operations 5 6 add => result: 11',
)]
class OperationsCommand extends Command
{
    private OperationService $operationService;

    public function __construct(OperationService $operationService)
    {
        parent::__construct();
        $this->operationService = $operationService;
    }
    protected function configure(): void
    {
        $this
            ->addArgument('operatorA', InputArgument::OPTIONAL, 'OperatorA')
            ->addArgument('operatorB', InputArgument::OPTIONAL, 'OperatorB')
            ->addArgument('operation', InputArgument::OPTIONAL, 'Operation')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $operatorA = $input->getArgument('operatorA');
        $operatorB = $input->getArgument('operatorB');
        $operation = $input->getArgument('operation');

        if ($operatorA) {
            $io->note(sprintf('You passed an OperatorA: %d', $operatorA));
        }

        if ($operatorB) {
            $io->note(sprintf('You passed an OperatorB: %d', $operatorB));
        }

        if ($operation) {
            $io->note(sprintf('You passed an Operation: %s', $operation));
        }

        try {
            $result = $this->operationService->getResult($operation, $operatorA, $operatorB);

            $output->writeln(sprintf('result: %s', $result));
        } catch (UnhandledMatchError $error) {
            $output->writeln(sprintf('error: %s', $error->getMessage()));
        }

        return Command::SUCCESS;
    }
}
