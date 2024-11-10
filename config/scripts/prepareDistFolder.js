import fs from 'fs';
import path from 'path';

// Define the files and directories to exclude
const exclude = [
  '.gitattributes',
  '.distignore',
  '.github',
  'placeholders',
  'config',
  '.git',
  'package.json'
];

// Get all items in the current directory
fs.readdirSync('./').forEach(item => {
  // Skip the excluded files and directories
  if (exclude.includes(item)) {
    return;
  }

  const itemPath = path.join(process.cwd(), item);
  fs.rmSync(itemPath, { recursive: true });
});
