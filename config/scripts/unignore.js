/**
 * remove lines from the .gitignore file
 */

import fs from "fs";
import path from "path";
import { parseArgs } from "node:util";
import { dd } from "./utils.js";

const { positionals: lines } = parseArgs({
  allowPositionals: true,
});

if (!lines.length) {
  throw new Error("please provide at least one file or folder name");
}

for (const line of lines) {
  removeFromGitignore(line);
}

/**
 * Remove an entry from the .gitignore file
 * @param {string} line
 */
function removeFromGitignore(line) {
  const filePath = path.join(process.cwd(), ".gitignore");

  if (!fs.existsSync(filePath)) {
    dd(".gitignore not found");
  }

  // Read the .gitignore file
  const data = fs.readFileSync(filePath, "utf8");

  // Remove the 'vendor' line
  const updatedData = data
    .split("\n")
    .filter((currentLine) => currentLine.trim() !== line)
    .join("\n");

  // Write the file
  fs.writeFileSync(filePath, updatedData, "utf8");

  console.log(`✅ Removed ${line} from .gitignore`);
}
