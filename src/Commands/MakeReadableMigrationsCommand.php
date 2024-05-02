<?php

namespace SaKanjo\ReadableMigrations\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SplFileInfo;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Finder\Finder;

#[AsCommand(name: 'make:readable-migrations')]
class MakeReadableMigrationsCommand extends Command
{
    protected $signature = 'make:readable-migrations {--pad=3} {--gap=1}';

    protected $description = 'Change migrations filenames to more readable numeric format';

    protected string $pattern = '/^(\d{4}_\d{2}_\d{2}_\d{6}|\d+)/';

    private int $renames = 0;

    public function handle(): int
    {
        $pad = (int) $this->option('pad');
        $gap = (int) $this->option('gap');

        $this->components->info('Collecting migrations.');

        $migrations = Finder::create()
            ->files()
            ->in(database_path('migrations'))
            ->depth(0);

        collect($migrations)
            ->sort()
            ->values()
            ->each(function (SplFileInfo $migration, int $index) use ($pad, $gap): void {
                $filename = $migration->getFilename();
                $newFilename = preg_replace($this->pattern, str_pad((string) ($index * $gap), $pad, '0', STR_PAD_LEFT), $filename);

                if ($filename === $newFilename) {
                    $this->components->twoColumnDetail($filename, '<fg=blue;options=bold>SKIPPED</>');

                    return;
                }

                $oldPathname = $migration->getPathname();
                $newPathname = (string) str($oldPathname)
                    ->dirname()
                    ->append(DIRECTORY_SEPARATOR)
                    ->append($newFilename);

                $this->components->task("$filename -> $newFilename", fn (): bool => File::move($oldPathname, $newPathname));

                $this->renames++;
            });

        $this->components->info("Renamed $this->renames ".Str::plural('file', $this->renames).'.');

        return static::SUCCESS;
    }
}
