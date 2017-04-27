<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Converter;

use Converter\Converter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of ConvertCommand
 *
 * @author hubert
 */
class ConvertCommand extends Command{
    
    private $name;
    
    /**
     * @see Command::configure()
     */
    protected function configure()
    {
        $this
            ->setName('convert')
            ->setDescription('Used to convert files to another format type.')
            ->setHelp('Komenda convert przyjmuje dwa argumenty: filepath oraz convert-to. Filepath oznacza scieżkę pliku, który chcemy zmienić, a convert-to plik których chcemy otrzymać')
            ->addArgument('filepath', InputArgument::REQUIRED, 'File path to convertion')
            ->addArgument('file-extension', InputArgument::REQUIRED, 'File extension of the original file')
            ->addArgument('convert-to', InputArgument::REQUIRED, 'Convert to this format');
    }

    /**
     * @see Command::execute(InputInterface $input, OutputInterface $output)
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filepath = $input->getArgument('filepath');
        $file_extension = $input->getArgument('file-extension');
        $convert_to = $input->getArgument('convert-to');
        
        $output->writeln('I am trying convert the file');
        $convertionTool = new Converter(file_get_contents($filepath), $file_extension);
        $convertionTool->decodeData($file_extension);
        $convertionTool->encodeData($convert_to);
        $convertionTool->saveWithLongPathName($filepath, $convert_to);
        $output->writeln('Probuje zmienic plik: '.$filepath.'na ten nowy format '.$convert_to);

        return 0;
    }
}
