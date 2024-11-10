import fs from "fs";
import path from "path";
import { c, error, fileExists } from "./utils.js";

const packageJsonPath = path.join(process.cwd(), "package.json");
const { name: packageName } = JSON.parse(
  fs.readFileSync(packageJsonPath, "utf8"),
);

if (!fileExists(packageName)) {
  error(
    `Folder ${c.red}${packageName}${c.reset} not found. Did you run 'composer scoped:create'?`,
  );
}

// Define the files and directories to exclude
const exclude = [
  packageName,
  ".gitattributes",
  ".distignore",
  ".github",
  "config",
  ".git",
  "package.json",
];

// Get all items in the current directory
fs.readdirSync("./").forEach((item) => {
  // Skip the excluded files and directories
  if (exclude.includes(item)) {
    return;
  }

  const itemPath = path.join(process.cwd(), item);
  fs.rmSync(itemPath, { recursive: true });
});
