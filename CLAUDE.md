# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Static HTML website for Spanish grammar notes written in Czech. Single-file architecture (index.html) designed for easy printing and offline study.

## Architecture

- **Single HTML file**: All content in `index.html` - no build system, no dependencies
- **Custom CSS**: Lightweight `style.css` (~2KB) with layout, table styling, and print styles
- **Print-optimized**: CSS includes print styles (page breaks, A4 formatting)
- **Minimal JavaScript**: only the auto-generated table of contents (inline script at the end of `index.html`)
- **Git-only deployment**: Changes committed directly to gh-pages branch

## Content Structure

Grammar sections in index.html organized as:
- Present tense (Přítomný čas) - regular and irregular conjugations, stem changes
- ser / estar / hay
- Pronouns (Zájmena) - object pronouns, demonstratives, possessives, personal pronoun overview table
- Comparison (Porovnávání) - inequality, equality, superlatives
- Gerundio - present progressive and other uses
- Past tenses - pretérito indefinido, imperfecto, perfecto compuesto, pluscuamperfecto
- Subjuntivo - present and imperfecto de subjuntivo
- Futuro, Condicional, condicionály
- Imperativo (rozkazovací způsob)
- Accents (Přízvuky)
- Vocabulary distinctions (saber/conocer, pedir/preguntar, por/para)

## Editing Guidelines

### HTML Structure
- All grammar tables use `table.table`
- Verb conjugation tables have 6 forms: yo/tú/él-ella-usted + nosotros/vosotros/ellos-ellas-ustedes
- Two tables can be placed side by side with `div.row > div.col-md-6` to save print space

### Custom CSS Classes
- `table.conj` - conjugation table: half width, equal columns, header as `<th colspan="2">`
- `table.conj.conj4` - conjugation table with pronouns (4 columns): add `<colgroup>` with `col.person` for pronoun columns, header `<th colspan="4">`
- `table.conj.conj-wide` - conjugation table with long notes in cells (wider)
- `table.narrow` - short non-conjugation tables (width by content, min. half)
- `th .note` - non-bold explanatory note in a table header (put on a new line with `<br>`)
- `.vs` - yellow background for endings (prepends a `-` before the ending)
- `.irr` - red text for irregular forms
- `.break` - force page break before element
- `.darker-background` - light gray background
- `.mt` - small top margin
- `.text-center` - centered cell content

### Typography Conventions
- Verb endings in tables wrapped in `<strong class="vs">` tags
- Irregular stem changes in `<strong class="irr">` tags
- Example sentences in `<em>` with Czech translations in parentheses
- Standalone strong forms use `<strong>` without classes

### Table of Contents
Generated automatically from `h2`/`h3` headings by the script at the bottom of `index.html`.
Keep the heading hierarchy correct (`h2` for topics, `h3` for subtopics, `h4` below that) - the ToC depends on it. Hidden when printing.

### Content Patterns
When adding new grammar sections:
1. Start with `<h2>` or `<h3>` heading
2. Add explanatory paragraph(s) in Czech
3. Include the complete conjugation/declension table
4. Provide 3-5 example sentences with translations
5. Note any irregular forms or exceptions

### Print Layout
- A4 size, margins (0.35" sides, 0.4" top/bottom) and page numbers are set via `@page` in `style.css`. In Chrome keep margins "Default" and disable "Headers and footers".
- Page breaks are controlled by CSS rules (no break after headings, intro paragraph kept with the following list/table, no breaks inside tables/`.row`/`li`, first two `li` kept together). Use `.break` only for manual page breaks.
- Colors are for screen only; prints on a B&W printer (backgrounds are not forced; `.irr` forms are distinguished by bold).
