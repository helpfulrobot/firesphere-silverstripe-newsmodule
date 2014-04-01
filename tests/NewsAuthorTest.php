<?php
/**
 * Test if the author is correctly set and created.
 * That means, extra spaces removed etc.
 *
 * @package News/blog module
 * @author Simon 'Sphere' Erkelens
 */
class NewsAuthorTest extends SapphireTest {
	
	protected static $fixture_file = 'NewsTest.yml';

	/**
	 * Tests if the authorname is correctly trimmed and a new AuthorHelper is created.
	 * Expected:
	 * Entry 1 and 3 have the same author and authorhelper.
	 * Entry 2 and 4 have the same author and authorhelper.
	 * The authorhelper names match the author names.
	 */
	public function testAuthor() {
		$entry1 = $this->objFromFixture('News', 'item1');
		$entry2 = $this->objFromFixture('News', 'item2');
		$entry3 = $this->objFromFixture('News', 'item3');
		$entry4 = $this->objFromFixture('News', 'futureitem');
		
		$this->assertEquals('Unit Test', $entry1->Author);
		$this->assertEquals('Test Unit', $entry2->Author);
		$this->assertEquals($entry2->Author, $entry4->Author);
		$this->assertNotEquals($entry1->AuthorHelper()->ID, $entry2->AuthorHelper()->ID);
		$this->assertEquals($entry1->AuthorHelper()->ID, $entry3->AuthorHelper()->ID);
		$this->assertEquals($entry2->AuthorHelper()->ID, $entry4->AuthorHelper()->ID);
		$this->assertEquals($entry1->Author, $entry1->AuthorHelper()->OriginalName);
		$this->assertEquals($entry2->Author, $entry2->AuthorHelper()->OriginalName);
	}
}